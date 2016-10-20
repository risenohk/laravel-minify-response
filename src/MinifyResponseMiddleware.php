<?php
/**
 * Created by PhpStorm.
 * User: ryanchan
 * Date: 18/5/2016
 * Time: 11:09 PM.
 */
namespace Riseno\MinifyResponse;

use Closure;

/**
 * Class MinifyResponseMiddleware.
 */
class MinifyResponseMiddleware
{
    /**
     * @var array
     */
    protected $search = [
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
    ];

    /**
     * @var array
     */
    protected $replace = [
        '>',
        '<',
        '\\1',
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var \Illuminate\Http\Response $response */
        $response = $next($request);

        if (env('APP_ENV', 'local') == 'production') {
            $response->setContent(
                $this->filterContent($response->getContent())
            );
        }

        return $response;
    }

    /**
     * Filter the spaces in the DOM.
     *
     * @param $content
     *
     * @return mixed
     */
    protected function filterContent($content)
    {
        if (preg_match("/\<html/i", $content) == 1 && preg_match("/\<\/html\>/i", $content) == 1) {
            return preg_replace($this->search, $this->replace, $content);
        }

        return $content;
    }
}

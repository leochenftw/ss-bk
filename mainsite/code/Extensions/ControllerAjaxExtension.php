<?php
use SaltedHerring\Debugger;
class ControllerAjaxExtension extends DataExtension
{
    public function index()
    {
        $request    =   $this->owner->request;
        $header     =   $this->owner->getResponse();

        if (!Director::isLive()) {
            $header->addHeader('Access-Control-Allow-Origin', '*');
            $header->addHeader('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
            $header->addHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        }

        if ($request->isAjax()) {
            // header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            // header('Access-Control-Max-Age: 1000');

            $header->addHeader('Content-Type', 'application/json');
            // $header->addHeader('Cache-Control', 'no-transform, public, max-age=300, s-maxage=900');

            return json_encode($this->owner->AjaxResponse());
        }

        return $this->owner->renderWith([$this->owner->ClassName, 'Page']);
    }

    public function AjaxResponse()
    {
        $nav                    =   [];
        $navigation             =   $this->owner->getMenu(1);
        foreach ($navigation as $nav_item)
        {
            $nav[]              =   [
                                        'title'     =>  $nav_item->MenuTitle,
                                        'url'       =>  $nav_item->Link(),
                                        'is_active' =>  $nav_item->LinkOrCurrent() == 'current'
                                    ];
        }

        return  [
                    'id'            =>  $this->owner->ID,
                    'url'           =>  $this->owner->Link() == '/home/' ? '/' : $this->owner->Link(),
                    'title'         =>  $this->owner->Title,
                    'content'       =>  $this->owner->Content,
                    'navigation'    =>  $nav
                ];
    }
}

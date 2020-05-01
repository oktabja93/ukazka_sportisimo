<?php

use Phalcon\Http\Request;

class CompanyController extends ControllerBase 
{

    private $page = 1;
    private $lines = 50;
    private $order = true;

    public function indexAction () {        
        $listData = Company::getList($this->getConfigView());
        $this->view->list = $listData["list"];
        if (!empty($listData["list"])) {
            $this->view->pageMenu = $this->getPageMenu($listData["pages"], $this->lines);
            $this->view->linesMenu = $this->getLinesMenu();
            $this->view->orderMenu = $this->getOrderMenu();
        }
        else {
            $this->view->pageMenu = "";
            $this->view->linesMenu = "";
            $this->view->orderMenu = "";    
        }
    }
    
    public function showAction ($id) {
        if ($id and is_numeric($id)) {
            $this->view->companyName = Company::find(array(
                "id=?0", 
                "bind" => array($id)
            ))->toArray();
        }
        else $this->view->companyName = "";
    }

    private function getConfigView () {
        $request = new Request();
        if ($request->get("lines") and is_numeric($request->get("lines"))) $this->lines = $request->get("lines");
        if ($request->get("page") and is_numeric($request->get("page"))) $this->page = $request->get("page");
        if ($request->get("order") == "desc") $this->order = false;
        return array(
            "lines" => $this->lines,
            "page" => $this->page,
            "order" => $this->order
        );
    }

    private function getPageMenu (int $pages, int $lines) {
        $act_page = 1;
        $act_line = 0;
        $menu = "";
        while ($act_page <= $pages) {
            $menu = $menu
                .$this->getLink($this->lines, $act_page, $this->orderToWord($this->order), $act_page)
                ." | ";
            $act_line = $act_line + $this->lines;
            $act_page++;
        }
        $menu = mb_substr($menu, 0, -3);
        return $menu;
    }

    private function getLinesMenu () {
        return $this->getLink(10, 1, $this->orderToWord($this->order), "10")
            ." | "
            .$this->getLink(50, 1, $this->orderToWord($this->order), "50")
            ." | "
            .$this->getLink(100, 1, $this->orderToWord($this->order), "100")
            ." | "
            .$this->getLink(1000, 1, $this->orderToWord($this->order), "1000");
    }

    private function getOrderMenu () {
        return $this->getLink($this->lines, $this->page, $this->orderToWord(true), "Vzestupně")
            ." | "
            .$this->getLink($this->lines, $this->page, $this->orderToWord(false), "Sestupně");
    }

    private function getLink ($lines, $page, $order, $text) {
        return "<a href='/company?lines="
        .strval($lines)
        ."&page=".strval($page)
        ."&order=".strval($order)
        ."'>".strval($text)."</a>";
    }

    private function orderToWord ($order) {
        if ($order) return "asc";
        else return "desc";
    }

}

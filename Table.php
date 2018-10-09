<?php
/**
 * 表格
 */
namespace table;

class Table{
    private $header = array();
    private $footer = '';
    
    /**
     * @param $header
     */
    public function setHeader($header){
        $this->header = explode(',',$header);
    }
    
    /**
     * @param $footer
     */
    public function setFooter($footer){
        $colspan = count($this->header);
        $this->footer = "<tr><td colspan='{$colspan}'>共{$footer}条记录</td></tr>";
    }
    
    /**
     * @return string
     */
    private function getHeader(){
       if($this->header){
           $header = '<thead><tr>';
           foreach ($this->header as $key=>$value){
               $header .= "<th>".$value."</th>";
           }
           $header.= "</tr></thead>";
           
           return $header;
       }else{
           return '';
       }
    }
    
    /**
     * @return string
     */
    private function getFooter(){
        if($this->footer){
            $foot = "<tfoot>";
            $foot .= $this->footer;
            $foot .= "</tfoot>";
            return $foot;
        }else{
            return '';
        }
    }
    
    /**
     * @param $content
     *
     * @return string
     */
    public function build($content){
        $header = $this->getHeader();
        $footer = $this->getFooter();
        
        $body = '<tbody>';
        foreach ($content as $key=>$value){
            $body .= "<tr>";
            foreach ($value as $k=>$v){
                $body .= "<td>$v</td>";
            }
            $body .='</tr>';
        }
        $body .='</tbody>';
        
        $table = $header.$body.$footer;
        
        return $table;
    }
}
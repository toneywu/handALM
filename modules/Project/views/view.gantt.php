<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 * @Package Gantt chart
 * @copyright Andrew Mclaughlan 2014
 * @author Andrew Mclaughlan <andrew@mclaughlan.info>
 */

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/MVC/View/SugarView.php');

class ProjectViewGantt extends SugarView{
    function __construct() {
        parent::SugarView();
    }


    function display(){
        //查询出人员
        global $db,$app_list_strings;
        $sql = "SELECT
            ct.id,
            ct.last_name,
            ct.first_name
        FROM
            contacts ct
        WHERE
            ct.deleted = 0";
        $result=$db->query($sql);
        $name=array();
        while ($row=$db->fetchByAssoc($result)) {
            if ($row['last_name']=="") {
                $name[]=array('key'=>$row['id'],'label'=>$row['first_name']);
            }else{
                $name[]=array('key'=>$row['id'],'label'=>$row['last_name']);
            }
        }
        $project_sql="SELECT
                pj.estimated_start_date,
                pj.estimated_end_date,
                TIMESTAMPDIFF(DAY,pj.estimated_start_date,pj.estimated_end_date) durtion,
                pj.status,
                pj.priority
            FROM 
                project pj
            WHERE 1=1
                AND pj.deleted=0
                AND pj.id='".$_REQUEST['project_id']."'";
        $result=$db->query($project_sql);
        $project=array();
        $row_id=0;
        while ($row=$db->fetchByAssoc($result)) {
            $project[$row_id][]=array("label"=>"开始:","value"=>$row['estimated_start_date']);
            $project[$row_id][]=array("label"=>"结束:","value"=>$row['estimated_end_date']);
            $project[$row_id][]=array("label"=>"持续时间:","value"=>$row['durtion']);
            $project[$row_id][]=array("label"=>"状态:","value"=>$app_list_strings["project_status_dom"][$row['status']]);
            //$project[$row_id][]=array("label"=>"负责人:","value"=>$row['last_name']);
            $project[$row_id][]=array("label"=>"优先级:","value"=>$app_list_strings["projects_priority_options"][$row['priority']]);
            $row_id++;
        }
        $this->ss->assign("record",$_REQUEST['project_id']);
        $this->ss->assign("prj_val",$project);
        echo '<script> var users='.json_encode($name).'</script>';
 	    echo $this->ss->fetch("modules/Project/tpls/gantt.tpl");
    }
}
?>

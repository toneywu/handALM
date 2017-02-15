<?php
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
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
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
 
require_once('include/MVC/Controller/SugarController.php');

class HAT_IncidentsController extends SugarController {
	
    public function action_MassUpdate() {
        $action=$_POST["action"];
        $delete_flag=$_POST["delete"];
        $occur_error=0;
        if($action=="MassUpdate"&&$delete_flag==true){
            
            $recordIds = explode(',', $_REQUEST['uid']);
            foreach ($recordIds as $recordId) {
                $incident_bean = BeanFactory::getBean("HAT_Incidents",$recordId);
                
                if($occur_error==0){
                    if($incident_bean->treatment_status=="Completed"){
                        $occur_error=1;
                    }
                }
            }
            if($occur_error==1){
                $queryParams = array(
                                'module' => 'HAT_Incidents',
                                'action' => 'index',
                                'error_message' => "勾选收支中存在已结算的项不可删除",
                                );
                SugarApplication::redirect('index.php?' . http_build_query($queryParams));
            }
        }
        parent :: action_MassUpdate();
        if($occur_error==0){
                $queryParams = array(
                                'module' => 'HAT_Incidents',
                                'action' => 'index',
                                'error_message' => "",
                                );
                SugarApplication::redirect('index.php?' . http_build_query($queryParams));
            }
    }
}

?> 

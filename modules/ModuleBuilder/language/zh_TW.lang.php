<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


$mod_strings = array(
    'LBL_LOADING' => '載入中' /*for 508 compliance fix*/,
    'LBL_HIDEOPTIONS' => '隱藏選項' /*for 508 compliance fix*/,
    'LBL_DELETE' => '刪除' /*for 508 compliance fix*/,
    'LBL_POWERED_BY_SUGAR' => 'Powered By SugarCRM' /*for 508 compliance fix*/,
    'help' => array(
        'package' => array(
            'create' => 'A <b>文件包</b> 為客戶化模塊扮演了容器的角色. 模塊,文件包都是工程的組成部分. 文件包可以包含一個或多個客戶化 <b>模塊</b> 這些客戶化模塊可以彼此關聯並且可以與應用中其他模塊相關聯.<br/><br/>在為您的工程創建文件包後, 您可以立刻為文件包創建模塊, 或者你可以接下來返回模塊生成器來完成工程.',
            'modify' => '有三列顯示在左邊.  "預設" 列包含的欄位將在列表中默認顯示, “有效”列包含一些用戶可以選擇作為客戶化列表顯示的欄位,  "隱藏" 列包含一些有效欄位，這些欄位既是你作為管理員默認添加也是用戶可以使用的欄位，但是當前不可用.',
            'name' => '文件包的 <b>名稱</b> . 這個名稱將在安裝過程中顯示.',
            'author' => '<b>作者</b> 顯示在安裝過程中作為創建文件包的實體名稱. 作者既可以是個體也可以是公司.
	',
            'description' => '這是文件包的 <b>描述</b> 將在安裝過程中顯示.',
            'publishbtn' => '點擊 <b>發佈</b> 來保存所有輸入的數據和創建文件包的安裝版本的 .zip文件.<br><br>使用 <b>模塊載入 </b> 來上傳 .zip 文件並且安裝文件包.',
            'deploybtn' => '點擊 <b>擴展</b> 來保存所有輸入的數據和安裝文件包, 包括所有的模塊在當前實例中.',
            'duplicatebtn' => '點擊 <b>複製</b> 來保存文件包的內容到一個新文件包中,並且顯示新文件包. <br/><br/>對於新文件包, 將自動生成一個新名稱，此名稱與上次生成的文件包相同並帶有一個數字值. 您可以重命名一個新文件包:輸入一個新 <b>名稱</b> 點擊 <b>保存</b>按鈕.',
            'exportbtn' => '點擊 <b>導出</b> 來創建 .zip 文件包含在客戶化訂製的文件包中.<br><br> 生成的文件包包含客戶化訂製的代碼, 並且這不是安裝版本的文件包.<br><br>使用<b>模塊載入</b> 來導入 .zip 文件並且使一個新文件包客戶化訂製有效.',
            'deletebtn' => '點擊 <b>刪除</b> 來刪除此文件包和與此文件包相關的所有文件.',
            'savebtn' => '點擊 <b>保存</b> 將保存所有的改動並使它們有效',
            'existing_module' => '點擊 <b>模塊名稱</b> 來編輯欄位屬性等, 關係和顯示風格等在模塊中的相關屬性.',
            'new_module' => '點擊 <b>新建模塊</b> 來為此文件包創建新模塊.',
            'key' => '這 5個字母, 字母數字 <b>關鍵值</b> 將會用於所有指南中的前綴, 在當前文件包中所有模塊的類名稱和資料庫表.<br><br>關鍵值用於實現使表名稱獨一無二.',
            'readme' => '你可以添加 <b>自述</b> 文本在本文件包中.<br><br>自述文件將在安裝過程中有效.',

        ),
        'main' => array(),
        'module' => array(
            'create' => 'Provide a <b>Name</b> for the module. The <b>Label</b> that you provide will appear in the navigation tab. <br/><br/>Choose to display a navigation tab for the module by checking the <b>Navigation Tab</b> checkbox.<br/><br/>Then choose the type of module you would like to create. <br/><br/>Select a template type. Each template contains a specific set of fields, as well as pre-defined layouts, to use as a basis for your module. <br/><br/>Click <b>Save</b> to create the module.',
            'modify' => 'You can change the module properties or customize the <b>Fields</b>, <b>Relationships</b> and <b>Layouts</b> related to the module.',
            'importable' => 'Checking the <b>Importable</b> checkbox will enable importing for this module.<br><br>A link to the Import Wizard will appear in the Shortcuts panel in the module.  The Import Wizard facilitates importing of data from external sources into the custom module.',
            'team_security' => '點擊 <b>團隊安全</b> 複選框,將使團隊安全在本模塊有效.  <br/><br/>如果團隊安全是有效的, 團隊選擇欄位將出現在模塊的記錄中 ',
            'reportable' => '選中這個框將允許這個模塊有報表運行.',
            'assignable' => '選中這個框將允許這個模塊的記錄分配給選擇它的用戶.',
            'has_tab' => '選擇 <b>導航標簽</b>打勾將為模塊提供導航標簽.',
            'acl' => '選擇這個框將使訪問控制有效,包括欄位水平的安全.',
            'studio' => '選擇這個框將允許管理員在工作室中客戶化本模塊.',
            'audit' => '選擇這個框將使審核在此模塊有效. 改變一定欄位將被記錄以便管理員可以重新查看所做修改的歷史記錄.',
            'viewfieldsbtn' => '點擊 <b>查看欄位</b> 來查看欄位和模塊的聯合併創建和編輯客戶化欄位.',
            'viewrelsbtn' => '點擊  <b>查看關聯關係</b> 來顯示與此模塊的關聯關係並創建新的關聯關係.',
            'viewlayoutsbtn' => '點擊 <b>查看版面佈局</b> 來查看模塊版面佈局和客戶化欄位範圍在本版面佈局中.',
            'duplicatebtn' => 'Click <b>Duplicate</b> to copy the properties of the module into a new module and to display the new module. <br/><br/>For the new module, a new name will be generated automatically by appending a number to the end of the name of the module used to create the new one.',
            'deletebtn' => 'Click <b>Delete</b> to delete this module.',
            'name' => 'This is the <b>Name</b> of the current module.<br/><br/>The name must be alphanumeric and must start with a letter and contain no spaces. (Example: HR_Management)',
            'label' => '這是將出現在導航標簽中的 <b>標簽</b> 在本模塊中. ',
            'savebtn' => 'Click <b>Save</b> to save all entered data related to the module.',
            'type_basic' => ' <b>基本</b> 模板類型提供基本欄位,如名稱,分配人，團隊,創建日期,和描述欄位.',
            'type_company' => ' <b>公司</b> 模板類型提供了特定組織欄位,如公司名稱,產業和用戶地址.<br/><br/>使用這個模板來創建模塊非常類似於標準帳戶模塊.',
            'type_issue' => ' <b>Issue</b> 模板類型提供客戶反饋信息- 和特定故障欄位,如數量,狀態,優先順序和描述信息.<br/><br/>使用這個摸班創建模塊非常類似於標準客戶反饋信息和鼓掌觸發器模塊.',
            'type_person' => ' <b>人員</b> 模板類型提供特定個體欄位,如敬稱,標題,名稱,地址和電話號碼 .<br/><br/>使用這個模板來創建模塊非常類似與標準合同和潛在客戶模塊.',
            'type_sale' => 'The <b>Sale</b> template type provides opportunity specific fields, such as Lead Source, Stage, Amount and Probability. <br/><br/>Use this template to create modules that are similar to the standard Opportunities module.',
            'type_file' => 'The <b>File</b> template provides Document specific fields, such as File Name, Document type, and Publish Date.<br><br>Use this template to create modules that are similar to the standard Documents module.',

        ),
        'dropdowns' => array(
            'default' => '左邊顯示兩列. 右手列, 標簽當前版面或先前版面是您改變模塊的版面. 左手列, 叫做工具箱, 包含當用戶編輯版面時可使用的有用元素和工具 . <br/><br/>如果佈局的空間起名為當前佈局那麼你正工作在複製當前版面佈局用於模塊的顯示.<br/><br/>如果它命名為前一個佈局那麼你工作在創建一個先前的點擊保存按鈕, 那這個模塊可能已經從用戶看到的版本發生了變化.',
            'editdropdown' => 'Dropdown lists can be used for standard or custom dropdown fields in any module.<br><br>Provide a <b>Name</b> for the dropdown list.<br><br>If any language packs are installed in the application, you can select the <b>Language</b> to use for the list items.<br><br>In the <b>Item Name</b> field, provide a name for the option in the dropdown list.  This name will not appear in the dropdown list that is visible to users.<br><br>In the <b>Display Label</b> field, provide a label that will be visible to users.<br><br>After providing the item name and display label, click <b>Add</b> to add the item to the dropdown list.<br><br>To reorder the items in the list, drag and drop items into the desired positions.<br><br>To edit the display label of an item, click the <b>Edit icon</b>, and enter a new label. To delete an item from the dropdown list, click the <b>Delete icon</b>.<br><br>To undo a change made to a display label, click <b>Undo</b>.  To redo a change that was undone, click <b>Redo</b>.<br><br>Click <b>Save</b> to save the dropdown list.',

        ),
        'subPanelEditor' => array(
            'modify' => 'All of the fields that can be displayed in the <b>Subpanel</b> appear here.<br><br>The <b>Default</b> column contains the fields that are displayed in the Subpanel.<br/><br/>The <b>Hidden</b> column contains fields that can be added to the Default column.'
        ,
            'savebtn' => 'Click <b>Save & Deploy</b> to save changes you made and to make them active within the module.',
            'historyBtn' => '單擊 <b>查看歷史</b> 可以查看並從歷史中恢復先前保存的佈局。',
            'historyDefault' => 'Click <b>Restore Default</b> to restore a view to its original layout.',
            'Hidden' => '隱藏欄位是對於在列表顯示中當前用戶使用無效的欄位.',
            'Default' => '預設欄位顯示於不創建客戶化列表顯示設置的用戶.',

        ),
        'listViewEditor' => array(
            'modify' => 'All of the fields that can be displayed in the <b>ListView</b> appear here.<br><br>The <b>Default</b> column contains the fields that are displayed in the ListView by default.<br/><br/>The <b>Available</b> column contains fields that a user can select in the Search to create a custom ListView. <br/><br/>The <b>Hidden</b> column contains fields that can be added to the Default or Available column.'
        ,
            'savebtn' => 'Click <b>Save & Deploy</b> to save changes you made and to make them active within the module.',
            'historyBtn' => 'Click <b>View History</b> to view and restore a previously saved layout from the history.<br><br><b>Restore</b> within <b>View History</b> restores the field placement within previously saved layouts. To change field labels, click the Edit icon next to each field.',
            'historyDefault' => 'Click <b>Restore Default</b> to restore a view to its original layout.<br><br><b>Restore Default</b> only restores the field placement within the original layout. To change field labels, click the Edit icon next to each field.',
            'Hidden' => '<b>Hidden</b> fields not currently available for users to see in ListViews.',
            'Available' => '<b>Available</b> fields are not shown by default, but can be added to ListViews by users.',
            'Default' => '<b>Default</b> fields appear in ListViews that are not customized by users.'
        ),
        'popupListViewEditor' => array(
            'modify' => 'All of the fields that can be displayed in the <b>ListView</b> appear here.<br><br>The <b>Default</b> column contains the fields that are displayed in the ListView by default.<br/><br/>The <b>Hidden</b> column contains fields that can be added to the Default or Available column.'
        ,
            'savebtn' => 'Click <b>Save & Deploy</b> to save changes you made and to make them active within the module.',
            'historyBtn' => 'Click <b>View History</b> to view and restore a previously saved layout from the history.<br><br><b>Restore</b> within <b>View History</b> restores the field placement within previously saved layouts. To change field labels, click the Edit icon next to each field.',
            'historyDefault' => 'Click <b>Restore Default</b> to restore a view to its original layout.<br><br><b>Restore Default</b> only restores the field placement within the original layout. To change field labels, click the Edit icon next to each field.',
            'Hidden' => '<b>Hidden</b> fields not currently available for users to see in ListViews.',
            'Default' => '<b>Default</b> fields appear in ListViews that are not customized by users.'
        ),
        'searchViewEditor' => array(
            'modify' => 'All of the fields that can be displayed in the <b>Search</b> form appear here.<br><br>The <b>Default</b> column contains the fields that will be displayed in the Search form.<br/><br/>The <b>Hidden</b> column contains fields available for you as an admin to add to the Search form.'
        ,
            'savebtn' => 'Clicking <b>Save & Deploy</b> will save all changes and make them active',
            'Hidden' => '<b>Hidden</b> fields do not appear in the Search.',
            'historyBtn' => 'Click <b>View History</b> to view and restore a previously saved layout from the history.<br><br><b>Restore</b> within <b>View History</b> restores the field placement within previously saved layouts. To change field labels, click the Edit icon next to each field.',
            'historyDefault' => 'Click <b>Restore Default</b> to restore a view to its original layout.<br><br><b>Restore Default</b> only restores the field placement within the original layout. To change field labels, click the Edit icon next to each field.',
            'Default' => '<b>Default</b> fields appear in the Search.'
        ),
        'layoutEditor' => array(
            'defaultdetailview' => 'The <b>Layout</b> area contains the fields that are currently displayed within the <b>DetailView</b>.<br/><br/>The <b>Toolbox</b> contains the <b>Recycle Bin</b> and the fields and layout elements that can be added to the layout.<br><br>Make changes to the layout by dragging and dropping elements and fields between the <b>Toolbox</b> and the <b>Layout</b> and within the layout itself.<br><br>To remove a field from the layout, drag the field to the <b>Recycle Bin</b>. The field will then be available in the Toolbox to add to the layout.'
        ,
            'defaultquickcreate' => 'The <b>Layout</b> area contains the fields that are currently displayed within the <b>QuickCreate</b> form.<br><br>The QuickCreate form appears in the subpanels for the module when the Create button is clicked.<br/><br/>The <b>Toolbox</b> contains the <b>Recycle Bin</b> and the fields and layout elements that can be added to the layout.<br><br>Make changes to the layout by dragging and dropping elements and fields between the <b>Toolbox</b> and the <b>Layout</b> and within the layout itself.<br><br>To remove a field from the layout, drag the field to the <b>Recycle Bin</b>. The field will then be available in the Toolbox to add to the layout.'
        ,
            //this defualt will be used for edit view
            'default' => 'The <b>Layout</b> area contains the fields that are currently displayed within the <b>EditView</b>.<br/><br/>The <b>Toolbox</b> contains the <b>Recycle Bin</b> and the fields and layout elements that can be added to the layout.<br><br>Make changes to the layout by dragging and dropping elements and fields between the <b>Toolbox</b> and the <b>Layout</b> and within the layout itself.<br><br>To remove a field from the layout, drag the field to the <b>Recycle Bin</b>. The field will then be available in the Toolbox to add to the layout.'
        ,
            'saveBtn' => '點擊此按鈕保存版面，以便您可以保存您的改動. 當您返回本模塊您將從以變化的版面開始. 您的版面將不會被用戶看到知道您點擊保存和發佈按鈕.',
            'historyBtn' => 'Click <b>View History</b> to view and restore a previously saved layout from the history.<br><br><b>Restore</b> within <b>View History</b> restores the field placement within previously saved layouts. To change field labels, click the Edit icon next to each field.',
            'historyDefault' => 'Click <b>Restore Default</b> to restore a view to its original layout.<br><br><b>Restore Default</b> only restores the field placement within the original layout. To change field labels, click the Edit icon next to each field.',
            'publishBtn' => '點擊此按鈕來展開佈局. 這意味著本此佈局將立即被本模塊的用戶看到.',
            'toolbox' => '工具箱包含各種各樣編輯版面的有用功能, 包括刪除的部分, 一組額外的元素和一組有效的欄位. 任何這些都可以被拖拽到界面上.',
            'panels' => '這些地方顯示了當展開時您的佈局將被本模塊的用戶看到.<br/><br/>您可以象保存欄位一樣保存元素, 拖拽它們到行和麵板上; 在工具箱中拖摘他們到垃圾箱便可刪除元素, 或者從工具箱拖拽新元素添加到版面希望的位置上.',
            'delete' => '在這裡拖拽任何元素來沖版面佈局中刪除它',
            'property' => 'Edit The label displayed for this field. <br/><b>Tab Order</b> controls in what order the tab key switches between fields.',
        ),
        'fieldsEditor' => array(
            'default' => 'The <b>Fields</b> that are available for the module are listed here by Field Name.<br><br>Custom fields created for the module appear above the fields that are available for the module by default.<br><br>To edit a field, click the <b>Field Name</b>.<br/><br/>To create a new field, click <b>Add Field</b>.',
            'mbDefault' => 'The <b>Fields</b> that are available for the module are listed here by Field Name.<br><br>To configure the properties for a field, click the Field Name.<br><br>To create a new field, click <b>Add Field</b>. The label along with the other properties of the new field can be edited after creation by clicking the Field Name.<br><br>After the module is deployed, the new fields created in Module Builder are regarded as standard fields in the deployed module in Studio.',
            'addField' => 'Select a <b>Data Type</b> for the new field. The type you select determines what kind of characters can be entered for the field. For example, only numbers that are integers may be entered into fields that are of the Integer data type.<br><br> Provide a <b>Name</b> for the field.  The name must be alphanumeric and must not contain any spaces. Underscores are valid.<br><br> The <b>Display Label</b> is the label that will appear for the fields in the module layouts.  The <b>System Label</b> is used to refer to the field in the code.<br><br> Depending on the data type selected for the field, some or all of the following properties can be set for the field:<br><br> <b>Help Text</b> appears temporarily while a user hovers over the field and can be used to prompt the user for the type of input desired.<br><br> <b>Comment Text</b> is only seen within Studio &/or Module Builder, and can be used to describe the field for administrators.<br><br> <b>Default Value</b> will appear in the field.  Users can enter a new value in the field or use the default value.<br><br> Select the <b>Mass Update</b> checkbox in order to be able to use the Mass Update feature for the field.<br><br>The <b>Max Size</b> value determines the maximum number of characters that can be entered in the field.<br><br> Select the <b>Required Field</b> checkbox in order to make the field required. A value must be provided for the field in order to be able to save a record containing the field.<br><br> Select the <b>Reportable</b> checkbox in order to allow the field to be used for filters and for displaying data in Reports.<br><br> Select the <b>Audit</b> checkbox in order to be able to track changes to the field in the Change Log.<br><br>Select an option in the <b>Importable</b> field to allow, disallow or require the field to be imported into in the Import Wizard.<br><br>Select an option in the <b>Duplicate Merge</b> field to enable or disable the Merge Duplicates and Find Duplicates features.<br><br>Additional properties can be set for certain data types.',
            'editField' => 'The properties of this field can be customized.<br><br>Click <b>Clone</b> to create a new field with the same properties.',
            'mbeditField' => 'The <b>Display Label</b> of a template field can be customized. The other properties of the field can not be customized.<br><br>Click <b>Clone</b> to create a new field with the same properties.<br><br>To remove a template field so that it does not display in the module, remove the field from the appropriate <b>Layouts</b>.'

        ),
        'exportcustom' => array(
            'exportHelp' => 'Export customizations made in Studio by creating packages that can be uploaded into another SuiteCRM instance through the <b>Module Loader</b>.<br><br>  First, provide a <b>Package Name</b>.  You can provide <b>Author</b> and <b>Description</b> information for package as well.<br><br>Select the module(s) that contain the customizations you wish to export. Only modules containing customizations will appear for you to select.<br><br>Then click <b>Export</b> to create a .zip file for the package containing the customizations.',
            'exportCustomBtn' => '點擊 <b>導出</b> 創建一個 .zip 文件，用於您想要導出的客戶化文件包.
	',
            'name' => 'This is the <b>Name</b> of the package. This name will be displayed during installation.',
            'author' => 'This is the <b>Author</b> that is displayed during installation as the name of the entity that created the package. The Author can be either an individual or a company.',
            'description' => '這是文件包的 <b>描述</b> 將在安裝過程中顯示.',
        ),
        'studioWizard' => array(
            'mainHelp' => '歡迎來到 <b>開發工具</b1> 位置. <br/><br/>在本區域使用工具創建和管理標準和客戶化模塊和欄位.',
            'studioBtn' => '使用 <b>工作室</b> 來客戶化安裝改變欄位範圍的模塊, 選擇所要創建客戶化數據欄位的有效欄位.',
            'mbBtn' => '使用 <b>模塊生成器</b> 創建新模塊.',
            'sugarPortalBtn' => 'Use <b>SuiteCRM Portal Editor</b> to manage and customize the SuiteCRM Portal.',
            'dropDownEditorBtn' => '使用 <b>下拉框編輯器</b> 添加和編輯用於應用的全局下拉框.',
            'appBtn' => '使用應用模型來客戶化程序中的不同屬性, 如多少TPS報表被顯示在主頁中',
            'backBtn' => '返回到前一步.',
            'studioHelp' => '使用 <b>工作室</b> 來客戶化安裝模塊.',
            'moduleBtn' => '點擊來編輯此模塊.',
            'moduleHelp' => '選擇您想要編輯的模塊組件',
            'fieldsBtn' => '編輯在模塊中存儲的信息，使用模塊中的控制 <b>欄位</b>.<br/><br/>您可以在這裡編輯並創建客戶化欄位.',
            'labelsBtn' => '點擊 <b>保存</b> 保存您的客戶化標簽.',
            'relationshipsBtn' => 'Add new or view existing <b>Relationships</b> for the module.',
            'layoutsBtn' => '客戶化 <b>版面</b> 的編輯, 細節, 列表和搜索顯示.',
            'subpanelBtn' => '編輯顯示在本模塊子面板中的信息.',
            'portalBtn' => 'Customize the module <b>Layouts</b> that appear in the <b>SuiteCRM Portal</b>.',
            'layoutsHelp' => '選擇一個 <b>界面來編輯</b>.<br/<br/>改變版面中包含的數據欄位和輸入數據, 點擊 <b>編輯顯示</b>.<br/><br/>在編輯顯示中來改變顯示數據和輸入數據的欄位的版面, 點擊 <b>細節顯示</b>.<br/><br/>該面在默認列表中的列, 點擊 <b>列表顯示</b>.<br/><br/>在界面中來改變基本和高級搜索, 點擊 <b>搜索</b>.',
            'subpanelHelp' => '選擇<b>子面板</b> 用於編輯.',
            'newPackage' => '點擊  <b>新建文件包</b> 創建一個新文件包.',
            'exportBtn' => '點擊 <b>導出客戶化訂製</b> 在本工作室中為特定模塊創建包含客戶化訂製模塊的文件包.',
            'mbHelp' => '<b>歡迎來到模塊生成器.</b><br/><br/>使用 <b>模塊生成器</b> 創建包含基於標準模塊的客戶化模塊或客戶化對象. <br/><br/>開始, 點擊 <b>新建文件包</b> 創建新文件包, 或選擇一個文件包編輯.<br/><br/> 一個<b>文件包</b> 扮演了一個客戶化模塊容器的角色, 文件包，模塊都是工程的一部分. 文件包能包含一個或多個客戶化模塊，這些模塊可以相互關聯在本應用中. <br/><br/>例如: 您可能想創建一個文件包包含一個客戶化模塊，此模塊與標準帳戶模塊相關聯. 或者, 您可能想創建一個包含若乾新模塊的文件包，這些模塊可以象一個工程一樣相互工作，相關關聯在本應用中.',
            'viewBtnEditView' => '編輯模塊的 <b>編輯顯示</b> 版面佈局.',
            'viewBtnDetailView' => '編輯模塊的 <b>細節顯示</b> 版面佈局.',
            'viewBtnDashlet' => 'Customize the module\'s <b>SuiteCRM Dashlet</b>, including the SuiteCRM Dashlet\'s ListView and Search.<br><br>The SuiteCRM Dashlet will be available to add to the pages in the Home module.',
            'viewBtnListView' => '編輯模塊的 <b>列表顯示</b> 版面佈局.',
            'searchBtn' => '編輯模塊的 <b>搜索</b> 版面佈局.',
            'viewBtnQuickCreate' => '編輯模塊的 <b>快速創建</b> 版面佈局.',
            'addLayoutHelp' => "To create a custom layout for a Security Group select the appropriate Security Group and the layout from which to copy from as a starting point.",

            'searchHelp' => '選擇 <b>搜索</b>版面編輯.',
            'dashletHelp' => 'The <b>SuiteCRM Dashlet</b> layouts that can be customized appear here.<br><br>The SuiteCRM Dashlet will be available to add to the pages in the Home module.',
            'DashletListViewBtn' => 'The <b>SuiteCRM Dashlet ListView</b> displays records based on the SuiteCRM Dashlet search filters.',
            'DashletSearchViewBtn' => 'The <b>SuiteCRM Dashlet Search</b> filters records for the SuiteCRM Dashlet listview.',
            'popupHelp' => 'The <b>Popup</b> layouts that can be customized appear here.<br>',
            'PopupListViewBtn' => 'The <b>Popup ListView</b> displays records based on the Popup search views.',
            'PopupSearchViewBtn' => 'The <b>Popup Search</b> views records for the Popup listview.',
            'BasicSearchBtn' => '編輯 <b>基本搜索</b> 在模塊搜索區域的基本搜索標簽中.',
            'AdvancedSearchBtn' => '編輯 <b>高級搜索</b> 在模塊搜索區域的基本搜索標簽中.',
            'portalHelp' => 'Manage and customize the <b>SuiteCRM Portal</b>.',
            'SPUploadCSS' => 'Upload a <b>Style Sheet</b> for the SuiteCRM Portal.',
            'SPSync' => '<b>Sync</b> customizations to the SuiteCRM Portal instance.',
            'Layouts' => 'Customize the <b>Layouts</b> of the SuiteCRM Portal modules.',
            'portalLayoutHelp' => 'The modules within the SuiteCRM Portal appear in this area.<br><br>Select a module to edit the <b>Layouts</b>.',
            'relationshipsHelp' => '您能關聯本模塊到相同文件包中其他模塊或者是已經安裝在應用中的模塊.<br/><br/>創建一個新的關聯關係, 點擊 <b>添加關聯</b>. 關聯關係屬性顯示在右手面板列中. 使用 <b>關聯到</b> 下拉框列表,選擇要關聯到當前模塊的模塊的列表.<br><br>提供一個 <b>標簽</b> 這個標簽將作為標題顯示相關模塊的子面板中.<br><br>在模塊記錄間的關聯將通過子面板被管理,此子面板細節顯示在模塊中.<br><br>作為相關模塊的子面板, 您可以為之選擇不同的子面板佈局顯示, 這取決於關聯中哪一個模塊被選擇了.<br/><br/> 點擊 <b>保存</b> 創建關聯關係. 點擊 <b>刪除</b> 刪除選擇了的關聯關係.<br/><br/>編輯存在的關聯, 點擊<b>關聯名稱</b>, 並且編輯屬性在右手面板列中.',
            'relationshipHelp' => '<b>Relationships</b> can be created between the module and another deployed module.<br><br> Relationships are visually expressed through subpanels and relate fields in the module records.<br><br>Select one of the following relationship <b>Types</b> for the module:<br><br> <b>One-to-One</b> - Both modules\' records will contain relate fields.<br><br> <b>One-to-Many</b> - The Primary Module\'s record will contain a subpanel, and the Related Module\'s record will contain a relate field.<br><br> <b>Many-to-Many</b> - Both modules\' records will display subpanels.<br><br> Select the <b>Related Module</b> for the relationship. <br><br>If the relationship type involves subpanels, select the subpanel view for the appropriate modules.<br><br> Click <b>Save</b> to create the relationship.',
            'convertLeadHelp' => 'Here you can add modules to the convert layout screen and modify the layouts of existing ones.<br/>
		You can re-order the modules by dragging their rows in the table.<br/><br/>
		<b>Module:</b> The name of the module.<br/><br/>
		<b>Required:</b> Required modules must be created or selected before the lead can be converted.<br/><br/>
		<b>Copy Data:</b> If checked, fields from the lead will be copied to fields with the same name in the newly created records.<br/><br/>
		<b>Allow Selection:</b> Modules with a relate field in Contacts can be selected rather than created during the convert lead process.<br/><br/>
		<b>Edit:</b> Modify the convert layout for this module.<br/><br/>
		<b>Delete:</b> Remove this module from the convert layout.<br/><br/>',
            'editDropDownBtn' => '編輯一個全局下拉框',
            'addDropDownBtn' => '添加一個新的全局下拉框',
        ),
        'fieldsHelp' => array(
            'default' => 'The <b>Fields</b> in the module are listed here by Field Name.<br><br>The module template includes a pre-determined set of fields.<br><br>To create a new field, click <b>Add Field</b>.<br><br>To edit a field, click the <b>Field Name</b>.<br/><br/>After the module is deployed, the new fields created in Module Builder, along with the template fields, are regarded as standard fields in Studio.',
        ),
        'relationshipsHelp' => array(
            'default' => 'The <b>Relationships</b> that have been created between the module and other modules appear here.<br><br>The relationship <b>Name</b> is the system-generated name for the relationship.<br><br>The <b>Primary Module</b> is the module that owns the relationships. The relationship properties are stored in the database tables belonging to the primary module.<br><br>The <b>Type</b> is the type of relationship exists between the Primary module and the <b>Related Module</b>.<br><br>Click a column title to sort by the column.<br><br>Click a row in the relationship table to view and edit the properties associated with the relationship.<br><br>Click <b>Add Relationship</b> to create a new relationship.',
            'addrelbtn' => '添加關聯幫助..',
            'addRelationship' => '可以創建模塊與自定義模塊或已部署模塊間的<b>關聯</b>。<br><br> 在模塊的紀錄中，關聯由子面板與關聯子欄位體現。<br><br>為模塊可選擇以下幾種關聯 <b>類型</b> :<br><br> <b>一對一</b> - 兩個模塊都會包含關聯欄位。<br><br> <b>一對多</b> - 主模塊將包含子面板，關聯模塊將包含關聯欄位。<br><br> <b>多對多</b> - 兩個模塊均顯示子面板。<br><br> 選擇 <b>關聯模塊</b>。 <br><br>如果關聯涉及子面板，選擇相應模塊的子面版外觀。<br><br> 單擊 <b>保存</b> 新建關聯。',
        ),
        'labelsHelp' => array(
            'default' => 'The <b>Labels</b> for the fields and other titles in the module can be changed.<br><br>Edit the label by clicking within the field, entering a new label and clicking <b>Save</b>.<br><br>If any language packs are installed in the application, you can select the <b>Language</b> to use for the labels.',
            'saveBtn' => 'Click <b>Save</b> to save all changes.',
            'publishBtn' => 'Click <b>Save & Deploy</b> to save all changes and make them active.',
        ),
        'portalSync' => array(
            'default' => 'Enter the <b>SuiteCRM Portal URL</b> of the portal instance to update, and click <b>Go</b>.<br><br>Then enter a valid SuiteCRM user name and password, and then click <b>Begin Sync</b>.<br><br>The customizations made to the SuiteCRM Portal <b>Layouts</b>, along with the <b>Style Sheet</b> if one was uploaded, will be transferred to specified the portal instance.',
        ),
        'portalStyle' => array(
            'default' => 'You can customize the look of the SuiteCRM Portal by using a style sheet.<br><br>Select a <b>Style Sheet</b> to upload.<br><br>The style sheet will be implemented in the SuiteCRM Portal the next time a sync is performed.',
        ),
    ),

    'assistantHelp' => array(
        'package' => array(
            //custom begin
            'nopackages' => '開始一個工程, 請點擊 <b>新建文件包</b> 來創建新文件包來收藏您的客戶模塊. <br/><br/>每一個文件包可以包含一個或多個模塊.<br/><br/>例如, 您可能想要創建一個包含客戶模塊的文件包此模塊與標準帳戶模塊相關. 或者, 您想要創建一個包含幾個新模塊的文件包,這幾個模塊可以協同工作在一個工程中並且彼此相關對於其他模塊已經在應用中.',
            'somepackages' => '一個 <b>文件包</b> 扮演了一個客戶模塊的容器角色, 客戶模塊,容器都是工程的一部分. 文件包可以包含一個或多個客戶 <b>模塊</b> ,客戶模塊可以與應用中其模塊設定關聯.<br/><br/>在為你的工程創建一個文件包後,您可以為文件包立刻創建模塊, 或者你能接下來返回到模塊生成器來完成工程.<br><br>當工程完成, 你可以 <b>展開</b> 文件包來安裝客戶化模塊在本應用中.',
            'afterSave' => 'Your new package should contain at least one module. You can create one or more custom modules for the package.<br/><br/>Click <b>New Module</b> to create a custom module for this package.<br/><br/> After creating at least one module, you can publish or deploy the package to make it available for your instance and/or other users\' instances.<br/><br/> To deploy the package in one step within your SuiteCRM instance, click <b>Deploy</b>.<br><br>Click <b>Publish</b> to save the package as a .zip file. After the .zip file is saved to your system, use the <b>Module Loader</b> to upload and install the package within your SuiteCRM instance.  <br/><br/>You can distribute the file to other users to upload and install within their own SuiteCRM instances.',
            'create' => 'A <b>package</b> acts as a container for custom modules, all of which are part of one project. The package can contain one or more custom <b>modules</b> that can be related to each other or to other modules in the application.<br/><br/>After creating a package for your project, you can create modules for the package right away, or you can return to the Module Builder at a later time to complete the project.',
        ),
        'main' => array(
            'welcome' => '使用 <b>開發工具</b> 來創建,管理標準,客戶化模塊和欄位. <br/><br/>在應用中管理模塊, 點擊 <b>工作室</b>. <br/><br/>創建客戶化模塊, 點擊 <b>模塊生成器</b>.',
            'studioWelcome' => '所有當前安裝的模塊, 包括標準和載入模塊對象,都在工作室中被訂製.'
        ),
        'module' => array(
            'somemodules' => "Since the current package contains at least one module, you can <b>Deploy</b> the modules in the package within your SuiteCRM instance or <b>Publish</b> the package to be installed in the current SuiteCRM instance or another instance using the <b>Module Loader</b>.<br/><br/>To install the package directly within your SuiteCRM instance, click <b>Deploy</b>.<br><br>To create a .zip file for the package that can be loaded and installed within the current SuiteCRM instance and other instances using the <b>Module Loader</b>, click <b>Publish</b>.<br/><br/> You can build the modules for this package in stages, and publish or deploy when you are ready to do so. <br/><br/>After publishing or deploying a package, you can make changes to the package properties and customize the modules further.  Then re-publish or re-deploy the package to apply the changes.",
            'editView' => '這裡您可以編輯存在的欄位. 您能移除任何存在的欄位或者在左面板中添加有效欄位.',
            'create' => 'When choosing the type of <b>Type</b> of module that you wish to create, keep in mind the types of fields you would like to have within the module. <br/><br/>Each module template contains a set of fields pertaining to the type of module described by the title.<br/><br/><b>Basic</b> - Provides basic fields that appear in standard modules, such as the Name, Assigned to, Team, Date Created and Description fields.<br/><br/> <b>Company</b> - Provides organization-specific fields, such as Company Name, Industry and Billing Address.  Use this template to create modules that are similar to the standard Accounts module.<br/><br/> <b>Person</b> - Provides individual-specific fields, such as Salutation, Title, Name, Address and Phone Number.  Use this template to create modules that are similar to the standard Contacts and Leads modules.<br/><br/><b>Issue</b> - Provides case- and bug-specific fields, such as Number, Status, Priority and Description.  Use this template to create modules that are similar to the standard Cases and Bugs modules.<br/><br/>Note: After you create the module, you can edit the labels of the fields provided by the template, as well as create custom fields to add to the module layouts.',
            'afterSave' => 'Customize the module to suit your needs by editing and creating fields, establishing relationships with other modules and arranging the fields within the layouts.<br/><br/>To view the template fields and manage custom fields within the module, click <b>View Fields</b>.<br/><br/>To create and manage relationships between the module and other modules, whether modules already in the application or other custom modules within the same package, click <b>View Relationships</b>.<br/><br/>To edit the module layouts, click <b>View Layouts</b>. You can change the Detail View, Edit View and List View layouts for the module just as you would for modules already in the application within Studio.<br/><br/> To create a module with the same properties as the current module, click <b>Duplicate</b>.  You can further customize the new module.',
            'viewfields' => '模塊中的欄位可以應您的需求自由訂製.<br/><br/>您可以刪除標準欄位, 但是您需要在版面頁的特定版面移除他們. <br/><br/>您可以編輯標準欄位的標簽. 標準欄位其他的屬性不可以被編輯. 儘管如此, 您可以點擊欄位名稱快速創建擁有相似屬性的新欄位，點擊 <b>克隆</b> 在 <b>屬性</b> 表格中.  輸入任何新屬性, 之後點擊 <b>保存</b>.<br/><br/>如果你正客戶化一個新模塊, 一點模塊已經安裝, 不是所有的欄位屬性都可以被編輯的.  當您在客戶化模塊發佈和安裝文件包之前為標準欄位和客戶化欄位設置所有的屬性.',
            'viewrelationships' => '在文件包中您可以在當前模塊和其他模塊創建多對多的關聯, 或者是在當前模塊和已經安裝到應用中的模塊間.<br><br> 創建一對多和一對一的關聯, 為模塊創建 <b>相關</b> 和 <b>Flex Relate</b> 欄位.',
            'viewlayouts' => '您可以通過<b>編輯顯示</b>控制欄位對於計算數據的有效性 .  您也可以通過 <b>細節顯示</b>控制數據的顯示.  顯示可以不匹配. <br/><br/>當在子面板中點擊<b>創建</b>，快速創建窗體將顯示. 默認的,  <b>快速創建</b> 窗口版面與默認的<b>編輯顯示</b> 版面相同. 您可以客戶化快速創建窗體以便它能包含與編輯顯示版面少數不同的欄位. <br><br>您可以使用<b>角色管理</b>版面客戶化訂製模塊安全性.<br><br>',
            'existingModule' => '在創建和客戶化本模塊之後, 您能創建附加模塊或者返回到文件包去 <b>發佈</b> 或者 <b>擴展</b> 文件包.<br><br>創建附加模塊，點擊 <b>複製</b> 創建與當前模塊相同屬性的模塊, 或導航返回到文件包, 並點擊 <b>新建模塊</b>.<br><br> 如果您準備 <b>發佈</b> 或者 <b>展開</b> 包含本模塊的文件包, 導航返迴文件包執行此功能. 您能發佈和展開的文件包至少要包含一個模塊.',
            'labels' => '標準欄位的標簽和客戶化欄位標簽可以被修改.  改變欄位標簽將不作用於存儲在此欄位中的數據.',
        ),
        'listViewEditor' => array(
            'modify' => 'There are three columns displayed to the left. The "Default" column contains the fields that are displayed in a list view by default, the "Available" column contains fields that a user can choose to use for creating a custom list view, and the "Hidden" column contains fields available for you as an admin to either add to the default or Available columns for use by users but are currently disabled.',
            'savebtn' => 'Clicking <b>Save</b> will save all changes and make them active.',
            'Hidden' => 'Hidden fields are fields that are not currently available to users for use in list views.',
            'Available' => 'Available fields are fields that are not shown by default, but can be enabled by users.',
            'Default' => 'Default fields are displayed to users who have not created custom list view settings.'
        ),

        'searchViewEditor' => array(
            'modify' => 'There are two columns displayed to the left. The "Default" column contains the fields that will be displayed in the search view, and the "Hidden" column contains fields available for you as an admin to add to the view.',
            'savebtn' => 'Clicking <b>Save & Deploy</b> will save all changes and make them active.',
            'Hidden' => 'Hidden fields are fields that will not be shown in the search view.',
            'Default' => 'Default fields will be shown in the search view.'
        ),
        'layoutEditor' => array(
            'default' => 'There are two columns displayed to the left. The right-hand column, labeled Current Layout or Layout Preview, is where you change the module layout. The left-hand column, entitled Toolbox, contains useful elements and tools for use when editing the layout. <br/><br/>If the layout area is titled Current Layout then you are working on a copy of the layout currently used by the module for display.<br/><br/>If it is titled Layout Preview then you are working on a copy created earlier by a click on the Save button, that might have already been changed from the version seen by users of this module.',
            'saveBtn' => 'Clicking this button saves the layout so that you can preserve your changes. When you return to this module you will start from this changed layout. Your layout however will not be seen by users of the module until you click the Save and Publish button.',
            'publishBtn' => 'Click this button to deploy the layout. This means that this layout will immediately be seen by users of this module.',
            'toolbox' => 'The toolbox contains a variety of useful features for editing layouts, including a trash area, a set of additional elements and a set of available fields. Any of these can be dragged and dropped onto the layout.',
            'panels' => 'This area shows how your layout will look to users of this module when it is depolyed.<br/><br/>You can reposition elements such as fields, rows and panels by dragging and dropping them; delete elements by dragging and dropping them on the trash area in the toolbox, or add new elements by dragging them from the toolbox and dropping them on to the layout in the desired position.'
        ),
        'dropdownEditor' => array(
            'default' => 'There are two columns displayed to the left. The right-hand column, labeled Current Layout or Layout Preview, is where you change the module layout. The left-hand column, entitled Toolbox, contains useful elements and tools for use when editing the layout. <br/><br/>If the layout area is titled Current Layout then you are working on a copy of the layout currently used by the module for display.<br/><br/>If it is titled Layout Preview then you are working on a copy created earlier by a click on the Save button, that might have already been changed from the version seen by users of this module.',
            'dropdownaddbtn' => '點擊此按鈕為下拉列表添加新條目 .',

        ),
        'exportcustom' => array(
            'exportHelp' => 'Customizations made in Studio within this instance can be packaged and deployed in another instance.  <br><br>Provide a <b>Package Name</b>.  You can provide <b>Author</b> and <b>Description</b> information for package.<br><br>Select the module(s) that contain the customizations to export. (Only modules containing customizations will appear for you to select.)<br><br>Click <b>Export</b> to create a .zip file for the package containing the customizations.  The .zip file can be uploaded in another instance through <b>Module Loader</b>.',
            'exportCustomBtn' => '點擊 <b>導出</b> 來創建一個.zip 文件為包含客戶化訂製您所希望導出的文件包.',
            'name' => 'The <b>Name</b> of the package will be displayed in Module Loader after the package is uploaded for installation in Studio.',
            'author' => 'The <b>Author</b> is the name of the entity that created the package. The Author can be either an individual or a company.<br><br>The Author will be displayed in Module Loader after the package is uploaded for installation in Studio.',
            'description' => 'The <b>Description</b> of the package will be displayed in Module Loader after the package is uploaded for installation in Studio.',
        ),
        'studioWizard' => array(
            'mainHelp' => 'Welcome to the <b>Developer Tools</b1> area. <br/><br/>Use the tools within this area to create and manage standard and custom modules and fields.',
            'studioBtn' => 'Use <b>Studio</b> to customize installed modules by changing the field arrangement, selecting what fields are available and creating custom data fields.',
            'mbBtn' => '使用 <b>模塊生成器</b> 創建新模塊.',
            'appBtn' => 'Use Application mode to customize various properties of the program, such as how many TPS reports are displayed on the homepage',
            'backBtn' => '返回到前一步.',
            'studioHelp' => 'Use <b>Studio</b> to customize installed modules.',
            'moduleBtn' => '點擊來編輯此模塊.',
            'moduleHelp' => 'Select the module component that you would like to edit',
            'fieldsBtn' => 'Edit what information is stored in the module by controlling the <b>Fields</b> in the module.<br/><br/>You can edit and create custom fields here.',
            'labelsBtn' => 'Click <b>Save</b> to save your custom labels.',
            'layoutsBtn' => 'Customize the <b>Layouts</b> of the Edit, Detail, List and search views.',
            'subpanelBtn' => 'Edit what information is shown in this modules subpanels.',
            'layoutsHelp' => 'Select a <b>Layout to edit</b>.<br/<br/>To change the layout that contains data fields for entering data, click <b>Edit View</b>.<br/><br/>To change the layout that displays the data entered into the fields in the Edit View, click <b>Detail View</b>.<br/><br/>To change the columns which appear in the default list, click <b>List View</b>.<br/><br/>To change the Basic and Advanced search form layouts, click <b>Search</b>.',
            'subpanelHelp' => 'Select a <b>Subpanel</b> to edit.',
            'searchHelp' => 'Select a <b>Search</b> layout to edit.',
            'labelsBtn' => 'Click <b>Save</b> to save your custom labels.',
            'newPackage' => '點擊  <b>新建文件包</b> 創建一個新文件包.',
            'mbHelp' => '<b>Welcome to Module Builder.</b><br/><br/>Use <b>Module Builder</b> to create packages containing custom modules based on standard or custom objects. <br/><br/>To begin, click <b>New Package</b> to create a new package, or select a package to edit.<br/><br/> A <b>package</b> acts as a container for custom modules, all of which are part of one project. The package can contain one or more custom modules that can be related to each other or to modules in the application. <br/><br/>Examples: You might want to create a package containing one custom module that is related to the standard Accounts module. Or, you might want to create a package containing several new modules that work together as a project and that are related to each other and to modules in the application.',
            'exportBtn' => 'Click <b>Export Customizations</b> to create a package containing customizations made in Studio for specific modules.',
        ),


    ),
//HOME
    'LBL_HOME_EDIT_DROPDOWNS' => '編輯下拉列表',

//ASSISTANT
    'LBL_AS_SHOW' => '今後顯示助手.',
    'LBL_AS_IGNORE' => '今後忽略助手.',
    'LBL_AS_SAYS' => '助手說:',


//STUDIO2
    'LBL_MODULEBUILDER' => '模塊生成器',
    'LBL_STUDIO' => '工作室',
    'LBL_DROPDOWNEDITOR' => '下拉列表編輯器',
    'LBL_EDIT_DROPDOWN' => '編輯下拉列表',
    'LBL_DEVELOPER_TOOLS' => '開發工具',
    'LBL_SUGARPORTAL' => 'SuiteCRM Portal Editor',
    'LBL_SYNCPORTAL' => '同步門戶',
    'LBL_PACKAGE_LIST' => '文件包列表',
    'LBL_HOME' => '主頁',
    'LBL_NONE' => '-無-',
    'LBL_DEPLOYE_COMPLETE' => '部署完成',
    'LBL_DEPLOY_FAILED' => '部署過程中出錯，你的模塊包有可能沒有能正確的安裝。',
    'LBL_ADD_FIELDS' => '添加客戶欄位',
    'LBL_AVAILABLE_SUBPANELS' => '子面板可用',
    'LBL_ADVANCED' => '高級',
    'LBL_ADVANCED_SEARCH' => '高級搜索',
    'LBL_BASIC' => '普通',
    'LBL_BASIC_SEARCH' => '普通搜索',
    'LBL_CURRENT_LAYOUT' => '當前佈局',
    'LBL_CURRENCY' => '貨幣',
    'LBL_CUSTOM' => '定製',
    'LBL_DASHLET' => 'SuiteCRM Dashlet',
    'LBL_DASHLETLISTVIEW' => 'SuiteCRM Dashlet ListView',
    'LBL_DASHLETSEARCH' => 'SuiteCRM Dashlet Search',
    'LBL_POPUP' => '彈出視圖',
    'LBL_POPUPLIST' => '彈出列表視圖',
    'LBL_POPUPLISTVIEW' => '彈出列表視圖',
    'LBL_POPUPSEARCH' => '彈出搜索',
    'LBL_DASHLETSEARCHVIEW' => 'SuiteCRM Dashlet Search',
    'LBL_DISPLAY_HTML' => '顯示HTML編碼',
    'LBL_DETAILVIEW' => '顯示細節',
    'LBL_DROP_HERE' => '[拽到這裡]',
    'LBL_EDIT' => '編輯',
    'LBL_EDIT_LAYOUT' => '編輯佈局',
    'LBL_EDIT_ROWS' => '編輯行',
    'LBL_EDIT_COLUMNS' => '編輯列',
    'LBL_EDIT_LABELS' => '編輯標簽',
    'LBL_EDIT_PORTAL' => '編輯門戶 ',
    'LBL_EDIT_FIELDS' => 'Edit Fields',
    'LBL_EDITVIEW' => '編輯顯示',
    'LBL_FILLER' => '(填充器)',
    'LBL_FIELDS' => '欄位',
    'LBL_FAILED_TO_SAVE' => '保存失敗',
    'LBL_FAILED_PUBLISHED' => '發佈失敗',
    'LBL_HOMEPAGE_PREFIX' => '我的',
    'LBL_LAYOUT_PREVIEW' => '預覽版面',
    'LBL_LAYOUTS' => '版面佈局',
    'LBL_LISTVIEW' => '列表',
    'LBL_MODULES' => '模塊',
    'LBL_MODULE_TITLE' => '工作室',
    'LBL_NEW_PACKAGE' => '新建文件包',
    'LBL_NEW_PANEL' => '新建面板',
    'LBL_NEW_ROW' => '新建行',
    'LBL_PACKAGE_DELETED' => '已刪除的包',
    'LBL_PUBLISHING' => '發佈中 ...',
    'LBL_PUBLISHED' => '已發佈',
    'LBL_SELECT_FILE' => '選擇文件',
    'LBL_SAVE_LAYOUT' => '保存佈局',
    'LBL_SELECT_A_SUBPANEL' => '選擇一個子面板',
    'LBL_SELECT_SUBPANEL' => '選擇子面板',
    'LBL_SUBPANELS' => '子面板',
    'LBL_SUBPANEL' => '子面板',
    'LBL_SUBPANEL_TITLE' => '子面板:',
    'LBL_SEARCH_FORMS' => '搜索窗體',
    'LBL_SEARCH' => '搜索',
    'LBL_STAGING_AREA' => '開始區域 (在這裡拖拽條目)',
    'LBL_SUGAR_FIELDS_STAGE' => 'SuiteCRM Fields (click items to add to staging area)',
    'LBL_SUGAR_BIN_STAGE' => 'SuiteCRM Bin (click items to add to staging area)',
    'LBL_TOOLBOX' => '工具箱',
    'LBL_VIEW_SUGAR_FIELDS' => 'View SuiteCRM Fields',
    'LBL_VIEW_SUGAR_BIN' => 'View SuiteCRM Bin',
    'LBL_QUICKCREATE' => '快速創建',
    'LBL_EDIT_DROPDOWNS' => '編輯一個全局下拉列表',
    'LBL_ADD_DROPDOWN' => '添加一個新的全局下拉列表',
    'LBL_BLANK' => '-空白-',
    'LBL_TAB_ORDER' => '標簽順序',
    'LBL_TAB_PANELS' => '把子面板顯示成標簽',
    'LBL_TAB_PANELS_HELP' => '在各自的標簽中顯示子面板，而不是全部顯示在同一個界面上。',
    'LBL_TABDEF_TYPE' => 'Display Type',
    'LBL_TABDEF_TYPE_HELP' => 'Select how this section should be displayed. This option only has effect if you have enabled tabs on this view.',
    'LBL_TABDEF_TYPE_OPTION_TAB' => 'Tab',
    'LBL_TABDEF_TYPE_OPTION_PANEL' => 'Panel',
    'LBL_TABDEF_TYPE_OPTION_HELP' => 'Select Panel to have this panel display within the view of the layout. Select Tab to have this panel displayed within a separate tab within the layout. When Tab is specified for a panel, subsequent panels set to display as Panel will be displayed within the tab. <br/>A new Tab will be started for the next panel for which Tab is selected. If Tab is selected for a panel below the first panel, the first panel will necessarily be a Tab.',
    'LBL_TABDEF_COLLAPSE' => 'Collapse',
    'LBL_TABDEF_COLLAPSE_HELP' => 'Select to make the default state of this panel collapsed.',
    'LBL_DROPDOWN_TITLE_NAME' => '下拉列表名稱',
    'LBL_DROPDOWN_LANGUAGE' => '下拉列表語言',
    'LBL_DROPDOWN_ITEMS' => '下拉列表條目',
    'LBL_DROPDOWN_ITEM_NAME' => '條目名稱',
    'LBL_DROPDOWN_ITEM_LABEL' => '顯示標簽',
    'LBL_SYNC_TO_DETAILVIEW' => '同步到詳細視圖',
    'LBL_SYNC_TO_DETAILVIEW_HELP' => 'Select this option to sync this EditView layout to the corresponding DetailView layout. Fields and field placement in the EditView<br>will be sync\'d and saved to the DetailView automatically upon clicking Save or Save & Deploy in the EditView. <br>Layout changes will not be able to be made in the DetailView.',
    'LBL_SYNC_TO_DETAILVIEW_NOTICE' => 'This DetailView is sync\'d with the corresponding EditView.<br> Fields and field placement in this DetailView reflect the fields and field placement in the EditView.<br> Changes to the DetailView cannot be saved or deployed within this page. Make changes or un-sync the layouts in the EditView. ',
    'LBL_COPY_FROM_EDITVIEW' => '從編輯視圖複製',
    'LBL_DROPDOWN_BLANK_WARNING' => 'Values are required for both the Item Name and the Display Label. To add a blank item, click Add without entering any values for the Item Name and the Display Label.',
    'LBL_DROPDOWN_KEY_EXISTS' => 'Key already exists in list',
    'LBL_NO_SAVE_ACTION' => 'Could not find the save action for this view.',
    'LBL_BADLY_FORMED_DOCUMENT' => 'Studio2:establishLocation: badly formed document',


//RELATIONSHIPS
    'LBL_MODULE' => '模塊',
    'LBL_LHS_MODULE' => '主模塊',
    'LBL_CUSTOM_RELATIONSHIPS' => '* 工作室或模塊生成器創建的模塊',
    'LBL_RELATIONSHIPS' => '關係',
    'LBL_RELATIONSHIP_EDIT' => '編輯關係',
    'LBL_REL_NAME' => '姓名',
    'LBL_REL_LABEL' => '標簽',
    'LBL_REL_TYPE' => '類型',
    'LBL_RHS_MODULE' => '關聯模塊',
    'LBL_NO_RELS' => '無關聯',
    'LBL_RELATIONSHIP_ROLE_ENTRIES' => '可選條件',
    'LBL_RELATIONSHIP_ROLE_COLUMN' => '列',
    'LBL_RELATIONSHIP_ROLE_VALUE' => '值',
    'LBL_SUBPANEL_FROM' => '子面板來自',
    'LBL_RELATIONSHIP_ONLY' => '沒有創建該關聯的可見元素，因為兩模塊已存在可見關聯。',
    'LBL_ONETOONE' => '一對一',
    'LBL_ONETOMANY' => '一對多',
    'LBL_MANYTOONE' => '多對一',
    'LBL_MANYTOMANY' => '多對多',


//STUDIO QUESTIONS
    'LBL_QUESTION_FUNCTION' => '選擇一項功能或組件.',
    'LBL_QUESTION_MODULE1' => '選擇一個模塊.',
    'LBL_QUESTION_EDIT' => '選擇一個模塊來編輯.',
    'LBL_QUESTION_LAYOUT' => '選擇一種版面來編輯.',
    'LBL_QUESTION_SUBPANEL' => '選擇一個子面板來編輯.',
    'LBL_QUESTION_SEARCH' => '選擇一個搜索版面來編輯.',
    'LBL_QUESTION_MODULE' => '選擇一個模塊組件來編輯.',
    'LBL_QUESTION_PACKAGE' => '選擇一個文件包來編輯,或創建一個新文件包.',
    'LBL_QUESTION_EDITOR' => '選擇一個工具.',
    'LBL_QUESTION_DROPDOWN' => '選擇一個下拉列表來編輯,或創建一個新下拉列表.',
    'LBL_QUESTION_DASHLET' => '選擇編輯一個統計圖佈局。',
    'LBL_QUESTION_POPUP' => '選擇一個彈出視圖編輯',
//CUSTOM FIELDS
    'LBL_RELATE_TO' => '相關',
    'LBL_NAME' => '名稱',
    'LBL_LABELS' => '標簽',
    'LBL_MASS_UPDATE' => '主體更新',
    'LBL_AUDITED' => '審計',
    'LBL_CUSTOM_MODULE' => '模塊',
    'LBL_DEFAULT_VALUE' => '默認值',
    'LBL_REQUIRED' => '需求',
    'LBL_DATA_TYPE' => '類型',
    'LBL_HCUSTOM' => '客戶',
    'LBL_HDEFAULT' => '默認',
    'LBL_LANGUAGE' => '語言:',
    'LBL_CUSTOM_FIELDS' => '* 由工作室創建的欄位',

//SECTION
    'LBL_SECTION_EDLABELS' => '編輯標簽',
    'LBL_SECTION_PACKAGES' => '文件包',
    'LBL_SECTION_PACKAGE' => '文件包',
    'LBL_SECTION_MODULES' => '模塊',
    'LBL_SECTION_PORTAL' => '門戶',
    'LBL_SECTION_DROPDOWNS' => '下拉列表',
    'LBL_SECTION_PROPERTIES' => '屬性',
    'LBL_SECTION_DROPDOWNED' => '下拉列表編輯器',
    'LBL_SECTION_HELP' => '幫助',
    'LBL_SECTION_ACTION' => '動作',
    'LBL_SECTION_MAIN' => '主要',
    'LBL_SECTION_EDPANELLABEL' => '編輯面板標簽',
    'LBL_SECTION_FIELDEDITOR' => '欄位編輯器',
    'LBL_SECTION_DEPLOY' => '展開',
    'LBL_SECTION_MODULE' => '模塊',
    'LBL_SECTION_VISIBILITY_EDITOR' => '編輯可見度',
//WIZARDS

//LIST VIEW EDITOR
    'LBL_DEFAULT' => '默認',
    'LBL_HIDDEN' => '隱藏',
    'LBL_AVAILABLE' => '可用',
    'LBL_LISTVIEW_DESCRIPTION' => '下麵顯示了三列.  <b>默認</b> 列包含的欄位被默認顯示在列表視圖中.  <b>附加</b> 列包含的欄位用戶可以選擇使用創建客戶視圖.   <b>可用</b> 行顯示當您為管理員是添加默認或附加行被用戶使用.',
    'LBL_LISTVIEW_EDIT' => '列表顯示編輯器',

//Manager Backups History
    'LBL_MB_PREVIEW' => '預覽',
    'LBL_MB_RESTORE' => '重新保存',
    'LBL_MB_DELETE' => '刪除',
    'LBL_MB_COMPARE' => '比較',
    'LBL_MB_DEFAULT_LAYOUT' => '默認佈局',

//END WIZARDS

//BUTTONS
    'LBL_BTN_ADD' => '填加',
    'LBL_BTN_SAVE' => '保存',
    'LBL_BTN_SAVE_CHANGES' => '保存更改',
    'LBL_BTN_DONT_SAVE' => '放棄更改',
    'LBL_BTN_CANCEL' => '取消',
    'LBL_BTN_CLOSE' => '關閉',
    'LBL_BTN_SAVEPUBLISH' => '保存 & 發佈',
    'LBL_BTN_NEXT' => '下一條',
    'LBL_BTN_BACK' => '後退',
    'LBL_BTN_CLONE' => '複製',
    'LBL_BTN_ADDCOLS' => '添加列',
    'LBL_BTN_ADDROWS' => '添加行',
    'LBL_BTN_ADDFIELD' => '添加欄位',
    'LBL_BTN_ADDDROPDOWN' => '添加下拉列表',
    'LBL_BTN_SORT_ASCENDING' => '升序排序',
    'LBL_BTN_SORT_DESCENDING' => '降序排序',
    'LBL_BTN_EDLABELS' => '編輯標簽',
    'LBL_BTN_UNDO' => '撤消',
    'LBL_BTN_REDO' => '重做',
    'LBL_BTN_ADDCUSTOMFIELD' => '添加客戶欄位',
    'LBL_BTN_EXPORT' => '導出客戶化訂製',
    'LBL_BTN_DUPLICATE' => '複製',
    'LBL_BTN_PUBLISH' => '發佈',
    'LBL_BTN_DEPLOY' => '部署',
    'LBL_BTN_EXP' => '導出',
    'LBL_BTN_DELETE' => '刪除',
    'LBL_BTN_VIEW_LAYOUTS' => '查看版面',
    'LBL_BTN_VIEW_FIELDS' => '查看欄位',
    'LBL_BTN_VIEW_RELATIONSHIPS' => '查看關係項',
    'LBL_BTN_ADD_RELATIONSHIP' => '添加關係項',
    'LBL_BTN_RENAME_MODULE' => '修改模塊名稱',
    'LBL_BTN_INSERT' => '插入',
//TABS


//ERRORS
    'ERROR_ALREADY_EXISTS' => '錯誤: 失敗已經存在',
    'ERROR_INVALID_KEY_VALUE' => "錯誤: 無效的關鍵值: [']",
    'ERROR_NO_HISTORY' => '沒有找到歷史文件',
    'ERROR_MINIMUM_FIELDS' => '佈局中必須包含一個欄位',
    'ERROR_GENERIC_TITLE' => '發生錯誤',
    'ERROR_REQUIRED_FIELDS' => '你確定要繼續嗎？下麵這些必選欄位沒有包含在這個版面中： ',
    'ERROR_ARE_YOU_SURE' => 'Are you sure you wish to continue?',


//PACKAGE AND MODULE BUILDER
    'LBL_PACKAGE_NAME' => '文件包名稱:',
    'LBL_MODULE_NAME' => '模塊名稱:',
    'LBL_AUTHOR' => '作者:',
    'LBL_DESCRIPTION' => '描述:',
    'LBL_KEY' => '關鍵值:',
    'LBL_ADD_README' => ' 自述',
    'LBL_LAST_MODIFIED' => '最新修改:',
    'LBL_NEW_MODULE' => '新增模塊',
    'LBL_LABEL' => '標簽:',
    'LBL_LABEL_TITLE' => '標簽',
    'LBL_WIDTH' => '寬',
    'LBL_PACKAGE' => '文件包:',
    'LBL_TYPE' => '類型:',
    'LBL_TEAM_SECURITY' => '團隊安全',
    'LBL_ASSIGNABLE' => '可分配',
    'LBL_PERSON' => '人員',
    'LBL_COMPANY' => '公司',
    'LBL_ISSUE' => '發行',
    'LBL_SALE' => '銷售',
    'LBL_FILE' => '文件',
    'LBL_NAV_TAB' => '導航標簽',
    'LBL_CREATE' => '創建',
    'LBL_LIST' => '列表',
    'LBL_VIEW' => '視圖',
    'LBL_LIST_VIEW' => '列表視圖',
    'LBL_HISTORY' => '歷史',
    'LBL_RESTORE_DEFAULT' => '恢復默認值',
    'LBL_ACTIVITIES' => '銷售活動',
    'LBL_NEW' => '新建',
    'LBL_TYPE_BASIC' => '基本',
    'LBL_TYPE_COMPANY' => '公司',
    'LBL_TYPE_PERSON' => '人員',
    'LBL_TYPE_ISSUE' => '發行',
    'LBL_TYPE_SALE' => '銷售',
    'LBL_TYPE_FILE' => '文件',
    'LBL_RSUB' => '這是將顯示在您模塊中的子面板',
    'LBL_MSUB' => '這是您模塊的子面板用於提供給相關模塊顯示',
    'LBL_MB_IMPORTABLE' => '導入',

// VISIBILITY EDITOR
    'LBL_VE_VISIBLE' => '可見',
    'LBL_VE_HIDDEN' => '隱藏',
    'LBL_PACKAGE_WAS_DELETED' => '[[package]] 已經被刪除',

//EXPORT CUSTOMS
    'LBL_EC_TITLE' => '導出客戶化訂製',
    'LBL_EC_NAME' => '文件包名稱:',
    'LBL_EC_AUTHOR' => '作者:',
    'LBL_EC_DESCRIPTION' => '描述:',
    'LBL_EC_KEY' => '關鍵值:',
    'LBL_EC_CHECKERROR' => '請選擇一個模塊.',
    'LBL_EC_CUSTOMFIELD' => '客戶化訂製欄位',
    'LBL_EC_CUSTOMLAYOUT' => '客戶化界面',
    'LBL_EC_NOCUSTOM' => '無模塊被客戶化訂製.',
    'LBL_EC_EMPTYCUSTOM' => '空白客戶化訂製.',
    'LBL_EC_EXPORTBTN' => '導出',
    'LBL_MODULE_DEPLOYED' => '模塊已打開.',
    'LBL_UNDEFINED' => '未定義',

//AJAX STATUS
    'LBL_AJAX_FAILED_DATA' => '輓回數據失敗',
    'LBL_AJAX_TIME_DEPENDENT' => '動作正在進行中,請耐心等待併在幾秒鐘後重試',
    'LBL_AJAX_LOADING' => '載入中...',
    'LBL_AJAX_DELETING' => '刪除中...',
    'LBL_AJAX_BUILDPROGRESS' => '建設過程中...',
    'LBL_AJAX_DEPLOYPROGRESS' => '擴展過程中...',
    'LBL_AJAX_FIELD_EXISTS' => '你輸入的欄位名已存在。請輸入一個新的欄位名。',

    'LBL_AJAX_RESPONSE_TITLE' => '結果',
    'LBL_AJAX_RESPONSE_MESSAGE' => 'This operation is completed successfully',
    'LBL_AJAX_LOADING_TITLE' => 'In Progress..',
    'LBL_AJAX_LOADING_MESSAGE' => 'Please wait, loading..',

//JS
    'LBL_JS_REMOVE_PACKAGE' => '您確定您要移除此文件包嗎? 這將永久刪除與此文件包相關的所文件.',
    'LBL_JS_REMOVE_MODULE' => '您確定要刪除該模塊嗎？這將徹底刪除模塊相關的文件和配置。',
    'LBL_JS_DEPLOY_PACKAGE' => '重新部署模塊，將覆蓋在工作室中做的所有定製。您確定要這樣做嗎？',

    'LBL_DEPLOY_IN_PROGRESS' => '部署文件包',
    'LBL_JS_VALIDATE_NAME' => '名稱 - 必須為字母數字並且以字母開頭',
    'LBL_JS_VALIDATE_PACKAGE_NAME' => 'Package Name already exists',
    'LBL_JS_VALIDATE_KEY' => '關鍵值 - 必須為字母數字並且以字母開頭',
    'LBL_JS_VALIDATE_LABEL' => '請輸入一條標簽作為此模塊的顯示名稱',
    'LBL_JS_VALIDATE_TYPE' => '請在列表中選擇你喜歡的模塊類型',
    'LBL_JS_VALIDATE_REL_NAME' => '名稱 - 必須為字母數字並且無空格',
    'LBL_JS_VALIDATE_REL_LABEL' => '標簽 - 請添加一條可顯示於子面板上',

//CONFIRM
    'LBL_CONFIRM_FIELD_DELETE' => 'Deleting this custom field will delete both the custom field and all the data related to the custom field in the database. The field will be no longer appear in any module layouts. \n\nDo you wish to continue?',
    'LBL_CONFIRM_RELATIONSHIP_DELETE' => '您確定您希望刪除此項關係嗎?',
    'LBL_CONFIRM_RELATIONSHIP_DEPLOY' => '將永久添加該關聯，是否部署？',
    'LBL_CONFIRM_DONT_SAVE' => '自上次保存已變化,您真要保存嗎?',
    'LBL_CONFIRM_DONT_SAVE_TITLE' => '保存更改?',
    'LBL_CONFIRM_LOWER_LENGTH' => '數據將被截斷，無法恢復。您確定要這樣做嗎？',

//POPUP HELP
    'LBL_POPHELP_FIELD_DATA_TYPE' => '請按照加入該欄位的數據類型選擇合適的數據類型。',
    'LBL_POPHELP_SEARCHABLE' => 'Select the boost level for this field. <br />Fields with a higher boost level will be given greater weight when the search is performed. <br />When a search is performed, matching records containing fields with a greater weight will be appear higher in the search results.<br /> If you change the boost level for a field from one level to another, perform a system index to apply the change. <br/> Be sure to select to delete the existing data at the time that the system index is performed.',
    'LBL_POPHELP_IMPORTABLE' => '<b>是:</b> 導入操作將加入該欄位。\n<b>否:</b> 導入操作不會加入該欄位。\n<b>必要:</b> 任何導入操作必須提供該欄位數值。',
    'LBL_POPHELP_IMAGE_WIDTH' => '輸入寬度，單位是像素。<br> 上傳的圖片文件將被縮放在這個寬度。',
    'LBL_POPHELP_IMAGE_HEIGHT' => '輸入高度，單位是像素。<br> 上傳的圖片文件將被縮放在這個高度。',
    'LBL_POPHELP_DUPLICATE_MERGE' => '<b>禁止:</b> 該欄位將在合併重覆時不會出現，在查找重覆時也不會做為篩選條件出現。.\n<b>啟用:</b> 該欄位將在合併重覆時出現，但在查找重覆時不會做為篩選條件出現。\n<b>在過濾:</b> 該欄位將在合併重覆時出現，但在查找重覆時也會做為篩選條件出現。\n<b>默認選擇的過濾:</b> 在查找重覆時，該欄位作為默認篩選條件，併在合併重覆時出現。<b>只過濾:</b> 該欄位將在合併重覆時不會出現，但在查找重覆時會做為篩選條件出現。\n'
,
    'LBL_POPHELP_GLOBAL_SEARCH' => 'Select to use this field when searching for records using the Global Search on this module.',
//Revert Module labels
    'LBL_RESET' => '重置',
    'LBL_RESET_MODULE' => '重置模塊',
    'LBL_REMOVE_CUSTOM' => '刪除定製內容',
    'LBL_CLEAR_RELATIONSHIPS' => '清楚模塊關聯',
    'LBL_RESET_LABELS' => '重置標簽',
    'LBL_RESET_LAYOUTS' => '重置版面',
    'LBL_REMOVE_FIELDS' => '刪除客戶化欄位',
    'LBL_CLEAR_EXTENSIONS' => '清除擴展',
    'LBL_HISTORY_TIMESTAMP' => '時間戳',
    'LBL_HISTORY_TITLE' => ' 歷史',


    'LBL_ADD_LAYOUT' => '新增佈局',
    'LBL_ADD_LAYOUTS' => '新增佈局',
    'LBL_QUESTION_ADD_LAYOUT' => '選擇群組佈局以新增。',
    'LBL_REMOVE_LAYOUT' => '移除群組佈局',

    'LBL_SECURITYGROUP' => '安全群組:',
    'LBL_COPY_FROM' => '複製自:',
    'LBL_ADDLAYOUTDONE' => '佈局已保存',
    'LBL_REMOVELAYOUTDONE' => '佈局已移除',
    'LBL_REMOVE_CONFIRM' => '你確定嗎?',

    'fieldTypes' => array(
        'varchar' => '字元型',
        'int' => '整型',
        'float' => '數值型',
        'bool' => '布爾型',
        'enum' => '枚舉型',
        'dynamicenum' => '動態下拉列表',
        'multienum' => '多選',
        'date' => '日期型',
        'phone' => '電話',
        'currency' => '貨幣',
        'html' => 'HTML',
        'radioenum' => '單選框',
        'relate' => '關係',
        'address' => '地址',
        'text' => '文本框',
        'url' => '超鏈接',
        'iframe' => '浮動窗口',
        'datetimecombo' => '日期型',
        'decimal' => '數值型',
        'image' => '圖片',
    ),
    'labelTypes' => array(
        "" => "經常使用的標簽",
        "all" => "全部標簽",
    ),

    'parent' => '彈性關聯',

    'LBL_ILLEGAL_FIELD_VALUE' => "下拉列表的鍵值不能包含引號。",
    'LBL_CONFIRM_SAVE_DROPDOWN' => "您將從下拉列表中刪除這個選項。所有使用這個選項的數據，將無法顯示出來。您確定要這樣做嗎？",
    'LBL_POPHELP_VALIDATE_US_PHONE' => 'Select to validate this field for the entry of a 10-digit<br> .phone number, with allowance for the country code 1, and<br> to apply a U.S. format to the phone number when the record<br> is saved. The following format will be applied: (xxx) xxx-xxxx.',
    'LBL_ALL_MODULES' => '全部模塊',
    'LBL_RELATED_FIELD_ID_NAME_LABEL' => '{0} (related {1} ID)',
);


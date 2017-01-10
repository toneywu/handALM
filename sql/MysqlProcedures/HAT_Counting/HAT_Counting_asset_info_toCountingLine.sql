USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_asset_info_toCountingLine`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_asset_info_toCountingLine`(in p_task_id varchar(100),
                        in p_location_id_c varchar(100),
                                              in p_org_id_c varchar(100),
                                              in p_major_id_c varchar(100),
                                              in p_category_id_c varchar(100),
                                              in p_user_id_c varchar(100),
                                              in p_own_id_c varchar(100),
                                              in p_framework_id varchar(100))
                                              
BEGIN
  DECLARE  not_found_line INT DEFAULT 0;
    declare line_id varchar(100);
    DECLARE  asset_id_c varchar(100) default '';
  DECLARE owning_org_id_c varchar(100) default '';
  DECLARE asset_location_id_c varchar(100) default '';
  DECLARE owning_major_id_c varchar(100) default '';
  DECLARE product_category_id_c varchar(100) default '';
    declare asset_status_c varchar(100) default '';
  declare description_c varchar(100) default '';
    declare user_person_id_c varchar(100);
    declare owning_person_id_c varchar(100);
    declare g_sysdate datetime default now();
    declare relationship_id varchar(100); 
    declare result_id varchar(100); 
    declare fixed_asset_id_c varchar(100);
  #根据规则筛选数据
  DECLARE  cur_info CURSOR FOR 
    select 
    cai.asset_id,
        cai.owning_org_id,
        cai.asset_location_id,
        cai.owning_major_id,
        cai.product_category_id,
        cai.asset_status,
        cai.description,
        cai.user_person_id,
        cai.owning_person_id,
        cai.fixed_asset_id
    from counting_asset_info cai
    where 1=1
    and cai.framework_id =p_framework_id
    and (if(p_org_id_c='@','@',if(p_org_id_c='$','$',p_org_id_c))='@' 
    or if(p_org_id_c='@','@',if(p_org_id_c='$','$',p_org_id_c))=
        if(cai.counting_org_id='','$',if(cai.counting_org_id is null,'$',cai.counting_org_id)))
  and (if(p_location_id_c='@','@',if(p_location_id_c='$','$',p_location_id_c))='@' 
    or if(p_location_id_c='@','@',if(p_location_id_c='$','$',p_location_id_c))=
        if(cai.counting_location_id='','$',if(cai.counting_location_id is null,'$',cai.counting_location_id)))
    and (if(p_major_id_c='@','@',if(p_major_id_c='$','$',p_major_id_c))='@' 
    or if(p_major_id_c='@','@',if(p_major_id_c='$','$',p_major_id_c))=
        if(cai.counting_major_id='','$',if(cai.counting_major_id is null,'$',cai.counting_major_id)))
    and (if(p_category_id_c='@','@',if(p_category_id_c='$','$',p_category_id_c))='@' 
    or if(p_category_id_c='@','@',if(p_category_id_c='$','$',p_category_id_c))=
        if(cai.counting_catogery_id='','$',if(cai.counting_catogery_id is null,'$',cai.counting_catogery_id)))
    and (if(p_user_id_c='@','@',if(p_user_id_c='$','$',p_user_id_c))='@' 
    or if(p_user_id_c='@','@',if(p_user_id_c='$','$',p_user_id_c))=
        if(cai.user_person_id='','$',if(cai.user_person_id is null,'$',cai.user_person_id)))
    and (if(p_own_id_c='@','@',if(p_own_id_c='$','$',p_own_id_c))='@' 
    or if(p_own_id_c='@','@',if(p_own_id_c='$','$',p_own_id_c))=
        if(cai.owning_person_id='','$',if(cai.owning_person_id is null,'$',cai.owning_person_id)));
    DECLARE  CONTINUE HANDLER FOR NOT FOUND  SET  not_found_line = 1;
     OPEN  cur_info; 
  FETCH  cur_info INTO asset_id_c,owning_org_id_c,asset_location_id_c,owning_major_id_c,product_category_id_c,asset_status_c,description_c,user_person_id_c,owning_person_id_c,fixed_asset_id_c;
  
    WHILE not_found_line != 1 DO
    #插入盘点明细
    set line_id=uuid();
insert into hat_counting_lines(id,
name,
date_entered,
date_modified,
hat_assets_id_c,
account_id_c,
hat_asset_locations_id_c,
asset_desc,
counting_status,
asset_status,
aos_products_id_c,
hat_counting_tasks_id_c,
haa_codes_id_c,
user_contacts_id_c,
own_contacts_id_c,
fixed_asset_id
) values(
line_id,
description_c,
g_sysdate,
g_sysdate,
asset_id_c,
owning_org_id_c,
asset_location_id_c,
description_c,
'New',
asset_status_c,
product_category_id_c,
p_task_id,
owning_major_id_c,
user_person_id_c,
owning_person_id_c,
fixed_asset_id_c);
  set relationship_id=uuid();
    set result_id=uuid();
    #插入关系表
    insert into hat_counting_lines_hat_counting_results_c values(relationship_id,
                                 g_sysdate,
                                                                 0,
                                                                 line_id,
                                                                 result_id); 
  #插入盘点结果
  insert into hat_counting_results(
id,
name,
date_entered,
date_modified,
counting_result,
account_id_c,
hat_asset_locations_id_c,
cycle_number,
loct_diff_flag,
org_diff_flag,
status_diff_flag,
adjust_needed,
adjust_method,
adjust_status,
haa_codes_id_c,
major_diff_flag,
user_contacts_id_c,
own_contacts_id_c,
user_diff_flag,
own_diff_flag
) 
values(
result_id,
'1',
g_sysdate,
g_sysdate,
'Matched',
null,
null,
'1',
0,
0,
0,
0,
'Retire',
'Init',
null,
0,
null,
null,
0,
0);
    FETCH  cur_info INTO asset_id_c,owning_org_id_c,asset_location_id_c,owning_major_id_c,product_category_id_c,asset_status_c,description_c,user_person_id_c,owning_person_id_c,fixed_asset_id_c;
END WHILE;
CLOSE  cur_info;
END$$

DELIMITER ;


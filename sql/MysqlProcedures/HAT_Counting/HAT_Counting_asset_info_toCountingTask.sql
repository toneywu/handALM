USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_asset_info_toCountingTask`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_asset_info_toCountingTask`(IN p_sql varchar(1000),
                                                                    in p_batch_id varchar(100),
                                                                    in p_location_flag int,
                                                                    in p_org_flag int,
                                                                    in p_major_flag int,
                                                                    in p_category_flag int,
                                                                    in p_user_person_flag int,
                                                                    in p_own_person_flag int,
                                                                    in p_user_id varchar(100))
                                                                    
BEGIN
    DECLARE  not_found INT DEFAULT 0;
    declare g_sysdate datetime default now();
    declare batch_id varchar(100);
    declare batch_number varchar(100);
    declare haa_frameworks_id_c varchar(100);
    declare batch_name varchar(100);
    declare objects_type varchar(100);
    declare batch_status varchar(100);
    declare planed_start_date varchar(100);
    declare planed_complete_date varchar(100);
    declare counting_by_location int default 0;
    declare counting_mode varchar(100);
    declare counting_scene varchar(100);
    declare task_name varchar(255) default '';
    declare task_number varchar(255) default '';
    declare number_temp varchar(255) default '';
    declare task_number_max varchar(255) default '';
    declare location_name varchar(255) default '';
    declare org_name varchar(255) default '';
    declare major_name varchar(255) default '';
    declare category_name varchar(255) default '';
    declare asset_id_c varchar(255);
    declare location_id_c varchar(255) default null;
    declare org_id_c varchar(255) default null;
    declare major_id_c varchar(255) default null;
    declare category_id_c varchar(255) default null;
    declare user_name varchar(255) default '';
    declare user_id_c varchar(255) default null;
    declare own_name varchar(255) default '';
    declare own_id_c varchar(255) default null;
    declare task_id varchar(100);
    declare flag_param varchar(255) default '';
    declare v_sql1 varchar(4000);
    declare v_sql2 varchar(4000);
    #数据按规则分组，用','将范围规则组合成一个字段
    DECLARE  cur_info CURSOR FOR 
    select *
    from temp_asset;
    DECLARE  CONTINUE HANDLER FOR NOT FOUND  SET  not_found = 1;
    drop table if exists temp_asset;
    set v_sql1 = concat('create temporary table temp_asset as select concat_ws(\',\',',p_sql);
    set v_sql2 = concat(v_sql1,') t from counting_asset_info group by t');
        
    set @v_sql = v_sql2;
    prepare statement from @v_sql;
    execute statement;
    deallocate prepare statement;
    
SELECT 
    hcb.id,
    hcb.haa_frameworks_id_c,
    hcb.`name` batch_name,
    hcb.objects_type,
    hcb.status,
    hcb.planed_start_date,
    hcb.planed_complete_date,
    hcb.counting_by_location,
    hcb.counting_mode,
    hcb.counting_scene
INTO batch_id , haa_frameworks_id_c , batch_name , objects_type , batch_status , planed_start_date , planed_complete_date , counting_by_location , counting_mode , counting_scene FROM
    hat_counting_batchs hcb
WHERE
    hcb.id = p_batch_id;
    
    OPEN  cur_info; 
    FETCH  cur_info INTO flag_param;
    WHILE not_found != 1 DO
    #取出范围ID段，第一位为!拼接要去掉，最后一位不特殊处理,flag不为1时，将对应ID置空
    #set asset_id_c=substring_index(flag_param,',',1);
    set flag_param=substring(flag_param,3);
    
    set task_name=batch_name;
    if p_location_flag = 1 then 
        set location_id_c=substring_index(flag_param,',',1);
        if location_id_c <> '$' and location_id_c is not null and location_id_c <>'' then
        set flag_param=substring(flag_param,38);
SELECT 
    a.name
INTO location_name FROM
    hat_asset_locations a
WHERE
    a.id = location_id_c;
        set task_name=concat_ws('-',location_name,task_name);
       
        else
        set location_id_c='$';
        set flag_param=substring(flag_param,2);
        end if;
    else 
        set location_id_c='@';
        set flag_param=substring(flag_param,3);
    end if;
  
    if p_org_flag = 1 then 
        set org_id_c=substring_index(flag_param,',',1);
        
        if org_id_c <> '$' and org_id_c is not null and org_id_c <>'' then 
        set flag_param=substring(flag_param,38);
SELECT 
    a.name
INTO org_name FROM
    accounts a
WHERE
    a.id = org_id_c;
        set task_name=concat_ws('-',org_name,task_name);
        
        else
        set org_id_c='$';
        
        set flag_param=substring(flag_param,2);
        end if;
    else    
        set org_id_c='@';
        set flag_param=substring(flag_param,3);
    end if;
    if p_major_flag = 1 then 
        set major_id_c=substring_index(flag_param,',',1);
       
        if major_id_c <> '$' and major_id_c is not null and major_id_c <>'' then 
        set flag_param=substring(flag_param,38);
        SELECT 
    a.name
INTO major_name FROM
    haa_codes a
WHERE
    a.id = major_id_c;
        set task_name=concat_ws('-',major_name,task_name);
        else 
        set major_id_c='$';
        
        set flag_param=substring(flag_param,2);
        end if;
    else 
        set major_id_c='@';
        set flag_param=substring(flag_param,3);
    end if;
    
    if p_category_flag = 1 then 
        set category_id_c=substring_index(flag_param,',',1);
        
        if category_id_c <> '$' and category_id_c is not null and category_id_c <>'' then
        set flag_param=substring(flag_param,38);
SELECT 
    a.name
INTO category_name FROM
    aos_product_categories a
WHERE
    a.id = category_id_c;
        set task_name=concat_ws('-',category_name,task_name);
        else 
        set category_id_c ='$';
        
        set flag_param=substring(flag_param,2);
        end if;
    else 
        set category_id_c ='@';
        set flag_param=substring(flag_param,3);
    end if;
    
    if p_user_person_flag = 1 then 
        set user_id_c=substring_index(flag_param,',',1);
        
        if user_id_c <> '$' and user_id_c is not null and user_id_c <>'' then
        set flag_param=substring(flag_param,38);
SELECT 
    concat_ws(',',a.last_name,if(a.first_name='',null,a.first_name)) full_name
INTO user_name FROM
    contacts a
WHERE
    a.id = user_id_c;
        set task_name=concat_ws('-',user_name,task_name);
        else 
        set user_id_c ='$';
        
        set flag_param=substring(flag_param,2);
        
        end if;
    else 
        set user_id_c ='@';
        set flag_param=substring(flag_param,3);
    end if;
    
    if p_own_person_flag = 1 then 
        set own_id_c=substring_index(flag_param,',',1);
        
        if own_id_c <> '$' and own_id_c is not null and own_id_c <>'' then
        select concat_ws(',',a.last_name,if(a.first_name='',null,a.first_name)) full_name
        into own_name
        from contacts a
        where a.id = own_id_c;
        set task_name=concat_ws('-',own_name,task_name);
        else 
        set own_id_c ='$';
        
        end if;
    else 
        set own_id_c ='@';
    end if;
    
SELECT 
    MAX(hct.task_number) task_number_max, hcb.batch_number
INTO task_number_max , batch_number FROM
    hat_counting_tasks hct,
    hat_counting_batchs hcb
WHERE
    hct.hat_counting_batchs_id_c = batch_id
        AND hcb.id = hct.hat_counting_batchs_id_c;
            
            if(task_number_max <>'' and task_number_max is not null) then 
                set number_temp=substring(task_number_max,-2)+1;
                
                if number_temp <10 then
                    set number_temp=concat('0',number_temp);
                end if;
                set task_number= concat(batch_number,number_temp);
            else
                set task_number=concat(batch_number,'01');
            end if;
    #插入盘点任务
    set task_id=uuid();
  insert into hat_counting_tasks(
id,
name,
date_entered,
date_modified,
counting_type,
counting_batch_status,
counting_task_status,
planed_start_date,
planed_complete_date,
account_id_c,
snapshot_date,
adjust_posted,
objects_type,
asset_status,
org_drilldown,
hat_asset_locations_id_c,
location_drilldown,
haa_frameworks_id_c,
hat_counting_batchs_id_c,
task_number,
contacts_id_c,
haa_codes_id_c,
major_drilldown,
aos_product_categories_id_c,
category_drilldown,
counting_mode,
counting_scene,
counting_by_location,
manual_add_flag,
user_contacts_id_c,
own_contacts_id_c,
offline_flag,
upinterface_flag,
modified_user_id,
created_by
) 
values(
task_id, 
task_name,
g_sysdate,
g_sysdate,
objects_type,
objects_type,
'New',#盘点状态
planed_start_date,
planed_complete_date,
if(org_id_c='@',null,if(org_id_c='$',null,org_id_c)),
g_sysdate,#快照时间
'N',#已经完成调整
objects_type,#盘点对象类型
'InService',
0,
if(location_id_c='@',null,if(location_id_c='$',null,location_id_c)),
0,
haa_frameworks_id_c,
batch_id,
task_number,
null,
if(major_id_c='@',null,if(major_id_c='$',null,major_id_c)),
0,
if(category_id_c='@',null,if(category_id_c='$',null,category_id_c)),
0,
counting_mode,
counting_scene,
counting_by_location,
0,
if(user_id_c='@',null,if(user_id_c='$',null,user_id_c)),
if(own_id_c='@',null,if(own_id_c='$',null,own_id_c)),
0,
0,
p_user_id,
p_user_id);

     #插入盘点明细 
     
    call HAT_Counting_asset_info_toCountingLine(task_id,location_id_c,org_id_c,major_id_c,category_id_c,user_id_c,own_id_c,haa_frameworks_id_c,p_user_id);
FETCH  cur_info INTO flag_param;

END WHILE;
CLOSE  cur_info;
END$$

DELIMITER ;


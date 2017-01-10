USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_get_asset_info`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_get_asset_info`(in p_framework_id varchar(100),
                                   in p_batch_rule_id varchar(100),
                                   in p_location_id varchar(100),
                   in p_org_id varchar(100),
                   in p_major_id varchar(100),
                   in p_category_id varchar(100),
                                   in p_user_id varchar(100),
                                   in p_own_id varchar(100))
BEGIN
DECLARE  not_found_asset INT DEFAULT 0;
DECLARE  asset_id_c varchar(100) default '';
DECLARE owning_org_id_c varchar(100) default '';
DECLARE asset_location_id_c varchar(100) default '';
DECLARE owning_major_id_c varchar(100) default '';
DECLARE product_id_c varchar(100) default '';
DECLARE product_category_id_c varchar(100) default '';
DECLARE framework_id_c varchar(100) default '';
DECLARE counting_org_id_c varchar(100) default '';
DECLARE counting_location_id_c varchar(100) default '';
DECLARE counting_major_id_c varchar(100) default '';
DECLARE counting_catogery_id_c varchar(100) default '';
declare user_person_id_c varchar(100) default '';
declare own_person_id_c varchar(100) default '';
DECLARE person_id_c varchar(100) default '';
declare asset_status_c varchar(100) default '';
declare description_c varchar(100) default '';
DECLARE pid_l varchar(100) default null;
DECLARE pid_o varchar(100) default null;
DECLARE pid_m varchar(100) default null;
DECLARE pid_c varchar(100) default null;

#根据范围筛选资产数据
DECLARE  cur_asset CURSOR FOR   
SELECT
ha.id,
ha.owning_org_id,
halha.hat_asset_locations_hat_assetshat_asset_locations_ida,
ha.owning_major_id,
ha.aos_products_id,
ha.aos_product_categories_id,
ha.haa_frameworks_id,
ha.counting_dept_id,
ha.counting_location_id,
ha.counting_major_id,
ha.counting_catogery_id,
ha.default_counting_person_id,
ha.asset_status,
ha.asset_desc,
ha.using_person_id,
ha.owning_person_id
FROM
hat_assets ha 
left join hat_asset_locations_hat_assets_c halha on ha.id = halha.hat_asset_locations_hat_assetshat_assets_idb
WHERE
1=1
AND ha.haa_frameworks_id = p_framework_id
and (p_location_id is null or p_location_id ='' 
  or exists(select * 
        from lpid_temp l 
        where l.temp_lpid=halha.hat_asset_locations_hat_assetshat_asset_locations_ida))
and (p_org_id is null or p_org_id =''
  or exists(select *
        from opid_temp o
                where o.temp_opid =ha.owning_org_id))
and (p_major_id is null or p_major_id =''
  or exists(select *
        from mpid_temp m
                where m.temp_mpid =ha.owning_major_id))
and (p_category_id is null or p_category_id =''
  or exists(select *
        from cpid_temp c
                where c.temp_cpid =ha.aos_product_categories_id))
and (p_user_id is null or p_user_id =''
  or exists(select *
        from upid_temp u
                where u.temp_upid = ha.using_person_id))
and (p_own_id is null or p_own_id =''
  or exists(select *
        from ownpid_temp own
                where own.temp_ownpid = ha.owning_person_id)); 

DECLARE  CONTINUE HANDLER FOR NOT FOUND  SET  not_found_asset = 1;
OPEN  cur_asset; 
FETCH  cur_asset INTO asset_id_c, owning_org_id_c,asset_location_id_c,owning_major_id_c,
product_id_c,product_category_id_c,framework_id_c,counting_org_id_c,counting_location_id_c,
counting_major_id_c,counting_catogery_id_c,person_id_c,asset_status_c,description_c,
user_person_id_c,own_person_id_c;

WHILE not_found_asset != 1 DO
  #将数据放入临时表
  insert into counting_asset_info values(asset_id_c, 
                       owning_org_id_c,
                       asset_location_id_c,
                       owning_major_id_c,
                       product_id_c,
                       product_category_id_c,
                       framework_id_c,
                       counting_org_id_c,
                       counting_location_id_c,
                       counting_major_id_c,
                       counting_catogery_id_c,
                       person_id_c,
                       p_batch_rule_id,
                       asset_status_c,
                       description_c,
                       user_person_id_c,
                       own_person_id_c);
                 
FETCH  cur_asset INTO asset_id_c, owning_org_id_c,asset_location_id_c,owning_major_id_c,
product_id_c,product_category_id_c,framework_id_c,counting_org_id_c,counting_location_id_c,
counting_major_id_c,counting_catogery_id_c,person_id_c,asset_status_c,description_c,
user_person_id_c,own_person_id_c;
END WHILE;
CLOSE  cur_asset;
END$$

DELIMITER ;


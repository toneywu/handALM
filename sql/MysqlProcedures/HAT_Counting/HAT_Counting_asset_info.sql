USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_asset_info`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_asset_info`(IN p_framework_id varchar(100),
                             in p_batch_id varchar(100))
BEGIN

DECLARE  not_found INT DEFAULT 0;
declare g_sysdate datetime default now();
declare rule_sql varchar(255) default '\'!\'';
declare  location_flag int;
declare location_id varchar(100) default null;
declare location_son_flag int;
declare org_flag int;
declare org_id varchar(100) default null;
declare org_son_flag int;
declare major_flag int;
declare major_id varchar(100) default null;
declare major_son_flag int;
declare category_flag int;
declare category_id varchar(100) default null;
declare category_son_flag int;
declare user_person_flag int;
declare user_id varchar(100) default null;
declare own_person_flag int;
declare own_id varchar(100) default null;
declare batch_rule_id varchar(100);
declare max_loc varchar(100);
declare max_org varchar(100);
declare max_major varchar(100);
declare max_cate varchar(100);
declare max_user varchar(100);
declare max_own varchar(100);
#当前批下的盘点规则
declare cur_rule cursor for
SELECT
  a.id,
  a.loc_split_flag,
  a.hat_asset_locations_id_c,
  a.location_drilldown,
  a.org_split_flag,
  a.account_id_c,
  a.org_drilldown,
  a.major_split_flag,
  a.haa_codes_id_c,
  a.major_drilldown,
  a.category_split_flag,
  a.aos_product_categories_id_c,
  a.category_drilldown,
  a.user_person_split_flag,
  a.user_contacts_id_c,
  a.own_person_split_flag,
  a.own_contacts_id_c
FROM
  hat_counting_batch_rules a,
  hat_counting_batchs_hat_counting_batch_rules_c b
where a.id = b.hat_counti8f01h_rules_idb
and b.hat_counti9a14_batchs_ida =p_batch_id;
DECLARE  CONTINUE HANDLER FOR NOT FOUND  SET  not_found = 1;

OPEN  cur_rule; 
FETCH  cur_rule INTO batch_rule_id,location_flag,location_id,location_son_flag,org_flag,org_id,org_son_flag,
           major_flag,major_id,major_son_flag,category_flag,category_id,category_son_flag,user_person_flag,
           user_id,own_person_flag,own_id;
WHILE not_found != 1 DO
#创建临时表
call HAT_Counting_create_temp();

  #整理子数据
    if location_id is not null and location_id <>'' then
  call HAT_Counting_get_sons(location_id,
        null,
        null,
        null,
                null,
                null,
                0,
                location_son_flag,
        0,
        0,
        0);
  end if;
    if org_id is not null and org_id <> '' then
  call HAT_Counting_get_sons(null,
        org_id,
        null,
        null,
                null,
                null,
                0,
                0,
        org_son_flag,
        0,
        0);
  end if;
    if major_id is not null and major_id <> '' then
  call HAT_Counting_get_sons(null,
        null,
        major_id,
        null,
                null,
                null,
                0,
                0,
        0,
        major_son_flag,
        0);
  end if;
    if category_id is not null and category_id <> '' then
  call HAT_Counting_get_sons(null,
        null,
        null,
        category_id,
                null,
                null,
                0,
                0,
        0,
        0,
        category_son_flag);
  end if;
  if user_id is not null and user_id <>'' then
  call HAT_Counting_get_sons(null,
        null,
        null,
        null,
                user_id,
                null,
                0,
                0,
        0,
        0,
        0);
  end if;
  if own_id is not null and own_id <>'' then
  call HAT_Counting_get_sons(null,
        null,
        null,
        null,
                null,
                own_id,
                0,
                0,
        0,
        0,
        0);
  end if;
  #根据范围整理资产数据
  call HAT_Counting_get_asset_info(p_framework_id,
          batch_rule_id,
                    location_id,
                    org_id,
                    major_id,
                    category_id,
                    user_id,
                    own_id);
                    
  #整理规则，动态给出分组条件，用空值列代替flag为0的情况
     #select a.asset_id from    counting_asset_info a;
    if location_flag =1 then
    set rule_sql =concat(rule_sql,',counting_location_id'); 
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
   
    end if;
    
    if org_flag =1 then
    set rule_sql =concat(rule_sql ,',counting_org_id');
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
    end if;
    
    if major_flag =1 then
    set rule_sql =concat(rule_sql ,',counting_major_id');
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
    end if;
    
    if category_flag =1 then
    set rule_sql =concat(rule_sql ,',counting_catogery_id');
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
    end if;
    
    if user_person_flag =1 then
    set rule_sql =concat(rule_sql ,',user_person_id');
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
    end if;
    if own_person_flag =1 then
    set rule_sql =concat(rule_sql ,',owning_person_id');
    else 
    set rule_sql =concat(rule_sql ,',\'$\'');
    end if;
    #插入盘点任务
    call HAT_Counting_asset_info_toCountingTask(rule_sql,p_batch_id,location_flag,org_flag,major_flag,category_flag,user_person_flag,own_person_flag);
  set rule_sql = '\'!\'';
FETCH  cur_rule INTO batch_rule_id,location_flag,location_id,location_son_flag,org_flag,org_id,org_son_flag,
           major_flag,major_id,major_son_flag,category_flag,category_id,category_son_flag,user_person_flag,
           user_id,own_person_flag,own_id;
END WHILE;
CLOSE  cur_rule;
#回写快照时间
update hat_counting_batchs a set a.snapshot_date=g_sysdate where a.id =p_batch_id;

END$$

DELIMITER ;


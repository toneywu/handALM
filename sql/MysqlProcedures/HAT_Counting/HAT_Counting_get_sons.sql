USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_get_sons`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_get_sons`(in lpid varchar(100),
                             in opid varchar(100),
                             in mpid varchar(100),
                             in cpid varchar(100),
                             in upid varchar(100),
                             in ownpid varchar(100),
                             in ndepth int,
                             in p_loc_son_flag int,
                             in p_org_son_flag int,
                             in p_major_son_flag int,
                             in p_category_son_flag int)
BEGIN
DECLARE not_found INT DEFAULT 0;
DECLARE pid_l varchar(100) default null;
DECLARE pid_o varchar(100) default null;
DECLARE pid_m varchar(100) default null;
DECLARE pid_c varchar(100) default null;
#筛选子数据
DECLARE  cur_loc CURSOR FOR   
select 
l.id
from hat_asset_locations l
where l.parent_location_id =lpid; 

DECLARE  cur_org CURSOR FOR   
select 
a.id
from accounts a
where a.parent_id =opid; 

DECLARE  cur_major CURSOR FOR   
select 
h.id
from haa_codes h
where h.parent_type_value_id =mpid;

DECLARE  cur_cate CURSOR FOR   
select 
a.id
from aos_product_categories a
where a.parent_category_id =cpid; 
DECLARE  CONTINUE HANDLER FOR NOT FOUND  SET  not_found = 1;

set @@SESSION.max_sp_recursion_depth =10;
#包括子位置
if  lpid is not null and lpid <> ''then
    insert into lpid_temp values(lpid,'loc',ndepth);
    if p_loc_son_flag =1 then 
OPEN  cur_loc; 
FETCH  cur_loc INTO pid_l;

WHILE not_found != 1 DO
    call HAT_Counting_get_sons(pid_l,null,null,null,null,null,ndepth+1,p_loc_son_flag,p_org_son_flag,p_major_son_flag,p_category_son_flag);
FETCH  cur_loc INTO pid_l;

END WHILE;
CLOSE  cur_loc;
end if;
end if;
set not_found=0;
#包括子组织
if  opid is not null and opid<>'' then
    insert into opid_temp values(opid,'org',ndepth);
    if p_org_son_flag =1 then 
OPEN  cur_org; 
FETCH  cur_org INTO pid_o;

WHILE not_found != 1 DO
    call HAT_Counting_get_sons(null,pid_o,null,null,null,null,ndepth+1,p_loc_son_flag,p_org_son_flag,p_major_son_flag,p_category_son_flag);
FETCH  cur_org INTO pid_o;

END WHILE;
CLOSE  cur_org;
end if;
end if;
set not_found=0;
#包括子专业
if  mpid is not null and mpid <> '' then
    insert into mpid_temp values(mpid,'major',ndepth);
    if p_major_son_flag =1 then 
OPEN  cur_major; 
FETCH  cur_major INTO pid_m ;

WHILE not_found != 1 DO
    call HAT_Counting_get_sons(null,null,pid_m,null,null,null,ndepth+1,p_loc_son_flag,p_org_son_flag,p_major_son_flag,p_category_son_flag);
FETCH  cur_major INTO pid_m;

END WHILE;
CLOSE  cur_major;
end if;
end if;
set not_found=0;

#包括子类别
if  cpid is not null and cpid <> '' then
    insert into cpid_temp values(cpid,'cate',ndepth);
    if p_category_son_flag =1 then 
OPEN  cur_cate; 
FETCH  cur_cate INTO pid_c;

WHILE not_found != 1 DO
    call HAT_Counting_get_sons(null,null,null,pid_c,null,null,ndepth+1,p_loc_son_flag,p_org_son_flag,p_major_son_flag,p_category_son_flag);
FETCH  cur_cate INTO pid_c;

END WHILE;
CLOSE  cur_cate;
end if;
end if;
#使用人
if  upid is not null and upid <> '' then
    insert into upid_temp values(upid,'user');
    end if;
#管理人
if  ownpid is not null and ownpid <> '' then
insert into upid_temp values(ownpid,'own');
end if;
END$$

DELIMITER ;


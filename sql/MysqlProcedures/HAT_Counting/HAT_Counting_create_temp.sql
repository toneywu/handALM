/*
Navicat MySQL Data Transfer

Source Server         : SuiteCRM
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : suitecrm

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-31 23:30:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Procedure structure for HAT_Counting_create_temp
-- ----------------------------
DROP PROCEDURE IF EXISTS `HAT_Counting_create_temp`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_create_temp`()
BEGIN
    drop table if exists lpid_temp;
CREATE TEMPORARY TABLE lpid_temp(
    temp_lpid varchar(100),
    lpid_type varchar(100),
    depth int
);
drop table if exists opid_temp;
CREATE TEMPORARY TABLE opid_temp(
    temp_opid varchar(100),
    opid_type varchar(100),
    depth int
);
drop table if exists mpid_temp;
CREATE TEMPORARY TABLE mpid_temp(
    temp_mpid varchar(100),
    mpid_type varchar(100),
    depth int
);
drop table if exists cpid_temp;
CREATE TEMPORARY TABLE cpid_temp(
    temp_cpid varchar(100),
    cpid_type varchar(100),
    depth int
);
drop table if exists upid_temp;
CREATE TEMPORARY TABLE upid_temp(
    temp_upid varchar(100),
    upid_type varchar(100)
);
drop table if exists ownpid_temp;
CREATE TEMPORARY TABLE ownpid_temp(
    temp_ownpid varchar(100),
    ownpid_type varchar(100)
);

drop table if exists counting_asset_info;
CREATE TEMPORARY TABLE counting_asset_info(
    asset_id varchar(100),
    owning_org_id varchar(100),
    asset_location_id varchar(100),
    owning_major_id varchar(100),
    product_id varchar(100),
    product_category_id varchar(100),
    framework_id varchar(100),
    counting_org_id varchar(100),
    counting_location_id varchar(100),
    counting_major_id varchar(100),
    counting_catogery_id varchar(100),
    person_id varchar(100),
    batch_rule_id varchar(100),
    asset_status varchar(100),
    description varchar(255),
    user_person_id varchar(100),
    owning_person_id varchar(100)
);

END
;;
DELIMITER ;

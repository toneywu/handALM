function setOwningOrgPopupReturn(popupReplyData){//选择完所属组织的动作
	set_return(popupReplyData);
	$("#owning_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#owning_person_id").val("");
}
function setUsingOrgPopupReturn(popupReplyData){//选择完使用组织的动作
	set_return(popupReplyData);
	$("#using_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#using_person_id").val("");
}
USE `suitecrm`;
DROP procedure IF EXISTS `HAT_Counting_reset`;

DELIMITER $$
USE `suitecrm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAT_Counting_reset`(in p_batch_id varchar(100))
BEGIN
#删除盘点结果
DELETE
FROM
	hat_counting_results
WHERE
	1 = 1
AND EXISTS (
	SELECT
		*
	FROM
		hat_counting_tasks,
		hat_counting_lines,
		hat_counting_lines_hat_counting_results_c
	WHERE
		1 = 1
	AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
	AND hat_counting_lines_hat_counting_results_c.hat_counting_lines_hat_counting_resultshat_counting_lines_ida = hat_counting_lines.id
	AND hat_counting_lines_hat_counting_results_c.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hat_counting_results.id
	AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id
);
DELETE FROM hat_counting_lines_hat_counting_results_c 
WHERE
    1 = 1
    AND EXISTS( SELECT 
        *
    FROM
        hat_counting_tasks,
        hat_counting_lines
    WHERE
        1 = 1
        AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
        AND hat_counting_lines_hat_counting_results_c.hat_counting_lines_hat_counting_resultshat_counting_lines_ida = hat_counting_lines.id
        AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id);
DELETE FROM document_revisions 
WHERE
    1 = 1
    AND EXISTS( SELECT 
        *
    FROM
        hat_counting_tasks,
        hat_counting_lines,
        hat_counting_lines_documents_c,
        documents
    
    WHERE
        1 = 1
        AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
        AND hat_counting_lines_documents_c.hat_counting_lines_documentsdocuments_idb = documents.id
        AND hat_counting_lines_documents_c.hat_counting_lines_documentshat_counting_lines_ida = hat_counting_lines.id
        AND documents.document_revision_id = document_revisions.id
        AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id);
DELETE FROM documents 
WHERE
    1 = 1
    AND EXISTS( SELECT 
        *
    FROM
        hat_counting_tasks,
        hat_counting_lines,
        hat_counting_lines_documents_c
    
    WHERE
        1 = 1
        AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
        AND hat_counting_lines_documents_c.hat_counting_lines_documentsdocuments_idb = documents.id
        AND hat_counting_lines_documents_c.hat_counting_lines_documentshat_counting_lines_ida = hat_counting_lines.id
        AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id);
DELETE FROM hat_counting_lines_documents_c 
WHERE
    1 = 1
    AND EXISTS( SELECT 
        *
    FROM
        hat_counting_tasks,
        hat_counting_lines
    
    WHERE
        1 = 1
        AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
        AND hat_counting_lines_documents_c.hat_counting_lines_documentshat_counting_lines_ida = hat_counting_lines.id
        AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id);
DELETE FROM hat_counting_lines 
WHERE
    1 = 1
    AND EXISTS( SELECT 
        *
    FROM
        hat_counting_tasks
    
    WHERE
        1 = 1
        AND hat_counting_tasks.id = hat_counting_lines.hat_counting_tasks_id_c
        AND hat_counting_tasks.hat_counting_batchs_id_c = p_batch_id);
DELETE FROM hat_counting_tasks 
WHERE
    hat_counting_batchs_id_c = p_batch_id;
END$$

DELIMITER ;


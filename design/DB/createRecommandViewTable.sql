--
-- Temporary table structure for view `mu_view_recommend`
--

DROP TABLE IF EXISTS `mu_view_recommend`;
/*!50001 DROP VIEW IF EXISTS `mu_view_recommend`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `mu_view_recommend` (
  `recommend_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `recommend_object_id` tinyint NOT NULL,
  `recommend_type` tinyint NOT NULL,
  `recommend_position` tinyint NOT NULL,
  `recommend_status` tinyint NOT NULL,
  `recommend_time` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `mu_view_recommend`
--

/*!50001 DROP TABLE IF EXISTS `mu_view_recommend`*/;
/*!50001 DROP VIEW IF EXISTS `mu_view_recommmuend`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER */
/*!50001 VIEW `mu_view_recommend` AS select `re`.`recommend_id` AS `recommend_id`,`ar`.`art_title` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_article` `ar` join `mu_recommend` `re` on((`ar`.`art_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 23) union all select `re`.`recommend_id` AS `recommend_id`,`su`.`supply_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_supply` `su` join `mu_recommend` `re` on((`su`.`supply_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 21) union all select `re`.`recommend_id` AS `recommend_id`,`pr`.`product_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_product` `pr` join `mu_recommend` `re` on((`pr`.`product_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 22) union all select `re`.`recommend_id` AS `recommend_id`,`ue`.`ent_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_user_enterprise` `ue` join `mu_recommend` `re` on((`ue`.`ent_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 24) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
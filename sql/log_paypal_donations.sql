-- ----------------------------
-- Table structure for `log_paypal_donations`
-- ----------------------------
DROP TABLE IF EXISTS `log_paypal_donations`;
CREATE TABLE `log_paypal_donations` (
  `transaction_id` varchar(64) NOT NULL DEFAULT '',
  `donation` varchar(255) NOT NULL DEFAULT '',
  `amount` double NOT NULL DEFAULT '0',
  `character_name` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

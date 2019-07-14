<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_initial extends CI_Migration {

        public function up()
        {
                // Create Database
                $this->dbforge->create_database('purelights_testing');

                // Client Table
                $this->dbforge->add_field("`clt_id` int(11) NOT NULL,
                `clt_referral` int(11) NOT NULL COMMENT 'Referred By Marketing Member',
                `clt_full_name` varchar(32) NOT NULL,
                `clt_aadhar` varchar(12) NOT NULL,
                `clt_pan` varchar(12) NOT NULL,
                `clt_mobile` varchar(10) NOT NULL,
                `clt_email` varchar(30) NOT NULL,
                `clt_bank_detail` text NOT NULL,
                `clt_address` varchar(30) NOT NULL,
                `clt_pin` varchar(6) NOT NULL,
                `clt_state` int(2) UNSIGNED NOT NULL,
                `clt_district` int(2) UNSIGNED NOT NULL,
                `clt_ps` varchar(20) NOT NULL COMMENT 'Police Station',
                `clt_dob` date NOT NULL COMMENT 'Date of Birth',
                `clt_status` enum('active','deactive') NOT NULL");
                $this->dbforge->create_table('client');

                // Ledger Table
                $this->dbforge->add_field("`lg_id` int(11) NOT NULL,
                `lg_sale_id` int(11) NOT NULL,
                `lg_bill_type` enum('base','emi') NOT NULL,
                `lg_payment_type` enum('cash','cheque') NOT NULL,
                `lg_cheque_no` int(11) DEFAULT NULL,
                `lg_amount` float UNSIGNED NOT NULL,
                `lg_status` enum('accept','admin_approval') DEFAULT 'admin_approval',
                `lg_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP");
                $this->dbforge->create_table('ledger');

                // Marketing Table
                $this->dbforge->add_field("`mrk_id` int(11) NOT NULL,
                `mrk_full_name` varchar(30) NOT NULL,
                `mrk_email` varchar(32) NOT NULL,
                `mrk_mobile` varchar(12) NOT NULL,
                `mrk_address` tinytext NOT NULL,
                `mrk_referral` int(11) NOT NULL,
                `mrk_referred_by` int(11) NOT NULL,
                `mrk_bank_detail` text,
                `mrk_salary` float DEFAULT NULL,
                `mrk_level` tinyint(1) NOT NULL COMMENT 'DC=1 BC=2 PO=3',
                `mrk_status` enum('active','deactive','delete') NOT NULL DEFAULT 'deactive',
                `mrk_created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP");
                $this->dbforge->create_table('marketing');

                // Product Table
                $this->dbforge->add_field("`prd_id` int(11) NOT NULL,
                `prd_name` varchar(30) NOT NULL,
                `prd_price` float UNSIGNED NOT NULL,
                `prd_base_price` float NOT NULL,
                `prd_subsidy` int(11) NOT NULL,
                `prd_firm_type` enum('agriculture','domestic','industry') NOT NULL,
                `prd_emi` int(11) NOT NULL,
                `prd_status` enum('active','deactive','delete') DEFAULT 'active'");
                $this->dbforge->create_table('product');

                // Sale Table
                $this->dbforge->add_field("`id` int(11) NOT NULL,
                `client_id` int(11) NOT NULL,
                `product_id` int(11) NOT NULL,
                `paid_amount` varchar(10) NOT NULL,
                `inst_amount` float DEFAULT NULL,
                `cheques` text NOT NULL,
                `buy_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
                $this->dbforge->create_table('sale');

                // Sessions Table
                $this->dbforge->add_field("`id` varchar(128) NOT NULL,
                `ip_address` varchar(45) NOT NULL,
                `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
                `data` blob NOT NULL");
                $this->dbforge->create_table('sessions');

                // Users Table
                $this->dbforge->add_field("`id` int(11) NOT NULL,
                `profile_id` int(11) DEFAULT NULL,
                `username` varchar(30) NOT NULL,
                `password` varchar(60) NOT NULL,
                `usertype` enum('admin','client','employee','marketing') DEFAULT 'admin',
                `email` varchar(30) NOT NULL,
                `status` enum('active','deactive') NOT NULL DEFAULT 'deactive',
                `created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP");
                $this->dbforge->create_table('users');

                // Primary Key Setup
                $this->db->query("ALTER TABLE `pl_client`
                ADD PRIMARY KEY (`clt_id`)");
                $this->db->query("ALTER TABLE `pl_ledger`
                ADD PRIMARY KEY (`lg_id`)");
                $this->db->query("ALTER TABLE `pl_marketing`
                ADD PRIMARY KEY (`mrk_id`)");
                $this->db->query("ALTER TABLE `pl_product`
                ADD PRIMARY KEY (`prd_id`)");
                $this->db->query("ALTER TABLE `pl_sale`
                ADD PRIMARY KEY (`id`)");
                $this->db->query("ALTER TABLE `pl_sessions`
                ADD KEY `ci_sessions_timestamp` (`timestamp`)");
                $this->db->query("ALTER TABLE `pl_users`
                ADD PRIMARY KEY (`id`)");

                // Auto Increment For All Tables
                $this->db->query("ALTER TABLE `pl_client`
                        MODIFY `clt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000");
                $this->db->query("ALTER TABLE `pl_ledger`
                        MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT");
                $this->db->query("ALTER TABLE `pl_marketing`
                        MODIFY `mrk_id` int(11) NOT NULL AUTO_INCREMENT");
                $this->db->query("ALTER TABLE `pl_product`
                        MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT");
                $this->db->query("ALTER TABLE `pl_sale`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000");
                $this->db->query("ALTER TABLE `pl_users`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

                //  Insert Default Value
                $users = ['username'=>'admin',
                        'password'=>password_hash('admin', PASSWORD_BCRYPT, ['cost'=>12]),
                        'usertype'=>'admin',
                        'email'=>'support@purelights.com',
                        'status'=>'active'
                ];
                $this->db->insert('pl_users', $users);
        }

        public function down()
        {
                
        }
}
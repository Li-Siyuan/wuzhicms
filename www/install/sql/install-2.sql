TRUNCATE wz_logintime;
TRUNCATE wz_logs;
TRUNCATE wz_member;
TRUNCATE wz_admin;
TRUNCATE wz_attachment;
TRUNCATE wz_attachment_tags;
TRUNCATE wz_attachment_tag_index;
TRUNCATE wz_collect_url;
TRUNCATE wz_editor_log;
TRUNCATE wz_express_address;
TRUNCATE wz_favorite;
TRUNCATE wz_friend_elite;
TRUNCATE wz_guestbook;
TRUNCATE wz_member_company_data;
TRUNCATE wz_member_detail_data;
TRUNCATE wz_member_invite;
TRUNCATE wz_message;
TRUNCATE wz_myfriend;
TRUNCATE wz_order_card;
TRUNCATE wz_order_card_send;
TRUNCATE wz_order_cart;
TRUNCATE wz_order_goods;
TRUNCATE wz_order_point;
TRUNCATE wz_order_subscribe;
TRUNCATE wz_pay;
TRUNCATE wz_receipt;
TRUNCATE wz_search_index;
TRUNCATE wz_search_result;
TRUNCATE wz_sms_checkcode;
ALTER TABLE `wz_block` CHANGE `lang` `lang` VARCHAR(10) NOT NULL DEFAULT 'zh';

/*
 Navicat Premium Data Transfer

 Source Server         : simpresdb psql
 Source Server Type    : PostgreSQL
 Source Server Version : 90201
 Source Host           : localhost:5432
 Source Catalog        : cpbaikdb
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90201
 File Encoding         : 65001

 Date: 22/07/2019 16:58:03
*/


-- ----------------------------
-- Sequence structure for seq_berita
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."seq_berita";
CREATE SEQUENCE "public"."seq_berita" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for seq_karyawan_log
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."seq_karyawan_log";
CREATE SEQUENCE "public"."seq_karyawan_log" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS "public"."berita";
CREATE TABLE "public"."berita" (
  "id" int4 NOT NULL DEFAULT nextval('seq_berita'::regclass),
  "judul" varchar(255) COLLATE "pg_catalog"."default",
  "isi" text COLLATE "pg_catalog"."default",
  "gambar" varchar(255) COLLATE "pg_catalog"."default",
  "kategori" varchar(255) COLLATE "pg_catalog"."default",
  "created_nik" varchar(255) COLLATE "pg_catalog"."default",
  "created_date" timestamp(6),
  "status" int2,
  "created_name" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO "public"."berita" VALUES (11, 'ini judul', 'ini isi', 'default-image.jpg', 'Berita', '518.2009.0027', '2019-07-22 04:27:07', 0, 'Rudi Rusdiawan');
INSERT INTO "public"."berita" VALUES (12, 'ini', 'itu', '1d7ca91fa1426341b87eabcf2c78add5.png', 'Berita', '518.2009.0027', '2019-07-22 06:28:42', 0, 'Rudi Rusdiawan');

-- ----------------------------
-- Table structure for karyawan_log
-- ----------------------------
DROP TABLE IF EXISTS "public"."karyawan_log";
CREATE TABLE "public"."karyawan_log" (
  "id" int4 NOT NULL DEFAULT nextval('seq_karyawan_log'::regclass),
  "nik" varchar(255) COLLATE "pg_catalog"."default",
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "last_login" timestamp(6)
)
;

-- ----------------------------
-- Records of karyawan_log
-- ----------------------------
INSERT INTO "public"."karyawan_log" VALUES (3, '518.2017.0269', 'Rudi Rudiatna', '2019-07-19 10:01:18');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-22 08:29:53');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-22 08:29:53');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-22 08:29:53');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-22 08:29:53');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."seq_berita"', 13, true);
SELECT setval('"public"."seq_karyawan_log"', 4, true);

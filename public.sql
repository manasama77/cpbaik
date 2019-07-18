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

 Date: 18/07/2019 17:23:50
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
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "created_date" timestamp(6),
  "status" int2
)
;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO "public"."berita" VALUES (1, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:03', 0);
INSERT INTO "public"."berita" VALUES (2, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:15', 0);
INSERT INTO "public"."berita" VALUES (3, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:04:27', 0);
INSERT INTO "public"."berita" VALUES (4, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:06:57', 0);
INSERT INTO "public"."berita" VALUES (5, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:08:27', 0);
INSERT INTO "public"."berita" VALUES (6, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:09:07', 0);
INSERT INTO "public"."berita" VALUES (1, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:03', 0);
INSERT INTO "public"."berita" VALUES (2, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:15', 0);
INSERT INTO "public"."berita" VALUES (3, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:04:27', 0);
INSERT INTO "public"."berita" VALUES (4, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:06:57', 0);
INSERT INTO "public"."berita" VALUES (5, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:08:27', 0);
INSERT INTO "public"."berita" VALUES (6, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:09:07', 0);
INSERT INTO "public"."berita" VALUES (1, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:03', 0);
INSERT INTO "public"."berita" VALUES (2, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:15', 0);
INSERT INTO "public"."berita" VALUES (3, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:04:27', 0);
INSERT INTO "public"."berita" VALUES (4, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:06:57', 0);
INSERT INTO "public"."berita" VALUES (5, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:08:27', 0);
INSERT INTO "public"."berita" VALUES (6, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:09:07', 0);
INSERT INTO "public"."berita" VALUES (1, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:03', 0);
INSERT INTO "public"."berita" VALUES (2, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:03:15', 0);
INSERT INTO "public"."berita" VALUES (3, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:04:27', 0);
INSERT INTO "public"."berita" VALUES (4, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:06:57', 0);
INSERT INTO "public"."berita" VALUES (5, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:08:27', 0);
INSERT INTO "public"."berita" VALUES (6, 'test', 'test', NULL, 'Berita', '518.2009.0027', '2019-07-18 12:09:07', 0);

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
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-18 09:36:08');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-18 09:36:08');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-18 09:36:08');
INSERT INTO "public"."karyawan_log" VALUES (1, '518.2009.0027', 'Rudi Rusdiawan', '2019-07-18 09:36:08');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."seq_berita"', 7, true);
SELECT setval('"public"."seq_karyawan_log"', 2, true);

CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "properties"(
  "id" integer primary key autoincrement not null,
  "title" varchar not null,
  "type" varchar check("type" in('maison', 'appartement', 'terrain')) not null,
  "surface" integer not null,
  "rooms" integer not null,
  "bedrooms" integer not null,
  "price" integer not null,
  "description" text not null,
  "city" varchar not null,
  "adress" varchar not null,
  "status" varchar check("status" in('complete', 'avaible', 'processing')) not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "options"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "option_property"(
  "option_id" integer not null,
  "property_id" integer not null,
  foreign key("option_id") references "options"("id") on delete cascade,
  foreign key("property_id") references "properties"("id") on delete cascade,
  primary key("option_id", "property_id")
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "email" varchar not null,
  "telephone" varchar not null,
  "type" varchar check("type" in('particulier', 'pro', 'acquereur')) not null,
  "adresse" varchar not null,
  "status" tinyint(1) not null,
  "email_verified_at" datetime,
  "password" varchar not null,
  "password_confirmation" varchar not null,
  "remember_token" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
                                      "key" varchar not null,
                                      "value" text not null,
                                      "expiration" integer not null,
                                      primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
                                            "key" varchar not null,
                                            "owner" varchar not null,
                                            "expiration" integer not null,
                                            primary key("key")
);

CREATE TABLE IF NOT EXISTS "jobs"(
                                     "id" integer primary key autoincrement not null,
                                     "queue" varchar not null,
                                     "payload" text not null,
                                     "attempts" integer not null,
                                     "reserved_at" integer,
                                     "available_at" integer not null,
                                     "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
                                            "id" varchar not null,
                                            "name" varchar not null,
                                            "total_jobs" integer not null,
                                            "pending_jobs" integer not null,
                                            "failed_jobs" integer not null,
                                            "failed_job_ids" text not null,
                                            "options" text,
                                            "cancelled_at" integer,
                                            "created_at" integer not null,
                                            "finished_at" integer,
                                            primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
                                            "id" integer primary key autoincrement not null,
                                            "uuid" varchar not null,
                                            "connection" text not null,
                                            "queue" text not null,
                                            "payload" text not null,
                                            "exception" text not null,
                                            "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "appartements"(
  "id" integer primary key autoincrement not null,
  "floor" integer not null,
  "ascenceur" tinyint(1) not null default '0',
  "balcon" tinyint(1) not null default '0',
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "terrains"(
  "id" integer primary key autoincrement not null,
  "constructible" tinyint(1) not null default '0',
  "zone" varchar check("zone" in('agricole', 'urbaine')) not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "profil_pros"(
  "id" integer primary key autoincrement not null,
  "agence" varchar not null,
  "rccm" varchar not null,
  "cc" varchar not null,
  "abonnement" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "maisons"(
  "id" integer primary key autoincrement not null,
  "nb_etages" integer not null,
  "jardin" tinyint(1) not null default '0',
  "garage" tinyint(1) not null default '0',
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "property_user"(
  "property_id" integer not null,
  "user_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("property_id") references "properties"("id") on delete cascade,
  foreign key("user_id") references "users"("id") on delete cascade,
  primary key("property_id", "user_id")
);
CREATE TABLE IF NOT EXISTS "profil_pro_user"(
  "profil_pro_id" integer not null,
  "user_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("profil_pro_id") references "profil_pros"("id") on delete cascade,
  foreign key("user_id") references "users"("id") on delete cascade,
  primary key("profil_pro_id", "user_id")
);
CREATE TABLE IF NOT EXISTS "property_appartement"(
  "property_id" integer not null,
  "appartement_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("property_id") references "properties"("id") on delete cascade,
  foreign key("appartement_id") references "appartements"("id") on delete cascade,
  primary key("property_id", "appartement_id")
);
CREATE TABLE IF NOT EXISTS "property_terrain"(
  "property_id" integer not null,
  "terrain_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("property_id") references "properties"("id") on delete cascade,
  foreign key("terrain_id") references "terrains"("id") on delete cascade,
  primary key("property_id", "terrain_id")
);
CREATE TABLE IF NOT EXISTS "property_maison"(
  "property_id" integer not null,
  "maison_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("property_id") references "properties"("id") on delete cascade,
  foreign key("maison_id") references "maisons"("id") on delete cascade,
  primary key("property_id", "maison_id")
);

INSERT INTO migrations VALUES(1,'2025_05_16_161454_2025_04_14_083521_create_properties_table',1);
INSERT INTO migrations VALUES(2,'2025_05_18_193610_create_options_table',1);
INSERT INTO migrations VALUES(3,'2025_05_19_111548_create_option_property_table',1);
INSERT INTO migrations VALUES(4,'2025_06_08_204958_create_users_table',1);
INSERT INTO migrations VALUES(5,'2025_06_09_000716_create_appartements_table',1);
INSERT INTO migrations VALUES(6,'2025_06_09_004528_create_terrains_table',1);
INSERT INTO migrations VALUES(7,'2025_06_09_161529_create_profil_pros_table',1);
INSERT INTO migrations VALUES(8,'2025_06_14_204536_create_maisons_table',1);
INSERT INTO migrations VALUES(9,'2025_06_18_111625_create_property_user_table',1);
INSERT INTO migrations VALUES(10,'2025_06_18_113817_create_profil_pro_user_table',1);
INSERT INTO migrations VALUES(11,'2025_06_18_120617_create_property_appartement_table',1);
INSERT INTO migrations VALUES(12,'2025_06_18_135051_create_property_terrain_table',1);
INSERT INTO migrations VALUES(13,'2025_06_18_135105_create_property_maison_table',1);

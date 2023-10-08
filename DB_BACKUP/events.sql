BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "events" (
	"id"	varchar NOT NULL,
	"name"	varchar NOT NULL,
	"tagline"	varchar NOT NULL,
	"banner_image"	varchar NOT NULL,
	"start_date"	datetime NOT NULL,
	"end_date"	datetime NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id")
);
INSERT INTO "events" VALUES ('9a1a0ebf-1b59-441a-8ec9-ce16967f5c0d','Faith Adventure 2023','Due Season','rMZugu3hZREu6mvUk93YWZKe0zOcCZ-metaZmEyMy5qcGc=-.jpg','2023-09-10 00:00:00','2023-09-17 00:00:00','2023-09-10 17:31:12','2023-09-10 17:31:12');
COMMIT;

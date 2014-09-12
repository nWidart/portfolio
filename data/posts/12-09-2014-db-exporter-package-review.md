title: Database Exporter package review
slug: db-exporter-package-review
status: draft
date: 12 sep 2014
tags: database,dbexporter,laravel

-------



In this article I'll go over my [Database Exporter](https://github.com/nWidart/DbExporter) package. Why use it, how it can be usefull in your projects and finally how to use it.

## What is DbExporter

DbExporter is a package to recreate migrations based on your current database schema. It analyses your database scruture for that purpuse. By default it takes the database that is setup in your `app/database.php` (or `config/database.php` if on laravel 4.3) file. This can be overwritten by sending an additional flag to the artisan command.


## Why use DbExporter?

So you may ask yourself why in the world would I use this package? When you're developing a Laravel application you're eager to use the migrations to create your database schema. 

And you're correct. But, as the application gets bigger, you may have times when you just want to add a column to a certain table, change a `varchar` type to `text`, etc. without having to go through the whole hassle of creating a migration file for that change, and applying the migration.

Sometimes you maybe just forgot to create the migration and made a small change to a database table and completely forgot the migration.

This is where my package comes in. It enables you to recreate migrations after the fact.

Don't get me wrong, I still suggest to create migrations for the big parts, when you're creating tables. This is more a tool, a backup for the times when you just want to go fast to modify the database. Or when you just completely forgot the create the migration.



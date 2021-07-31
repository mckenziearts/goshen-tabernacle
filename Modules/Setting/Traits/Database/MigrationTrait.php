<?php

namespace Modules\Setting\Traits\Database;

use Illuminate\Database\Schema\Blueprint;

trait MigrationTrait
{
    /**
     * Create fields common to all tables.
     *
     * @param  Blueprint  $table
     * @param  boolean  $hasSoftDelete
     */
    public function addCommonFields(Blueprint $table, bool $hasSoftDelete = false): void
    {
        $table->id();
        $table->timestamps();

        if ($hasSoftDelete) {
            $table->softDeletes();
        }
    }

    /**
     * Create fields common to seo.
     *
     * @param  Blueprint  $table
     * @return void
     */
    public function addSeoFields(Blueprint $table): void
    {
        $table->string('seo_title', 60)->nullable();
        $table->string('seo_description', 160)->nullable();
    }

    /**
     * Link table to $tableName using $columnName.
     *
     * @param  Blueprint  $table     Laravel Blueprint
     * @param  string  $columnName   MySQL table column name
     * @param  string  $tableName    MySQL table name
     * @param  boolean  $nullable    Foreign key nullable status
     */
    public function addForeignKey(Blueprint $table, string $columnName, string $tableName, bool $nullable = true): void
    {
        if ($nullable) {
            $table->unsignedBigInteger($columnName)->index()->nullable();
            $table->foreign($columnName)->references('id')->on($tableName)->onDelete('set null');
        } else {
            $table->unsignedBigInteger($columnName)->index();
            $table->foreign($columnName)->references('id')->on($tableName)->onDelete('CASCADE');
        }
    }

    /**
     * Remove foreign key using $columnName.
     *
     * @param  Blueprint  $table   Laravel Blueprint
     * @param  string  $columnName  Column on the table
     */
    public function removeLink(Blueprint $table, string $columnName): void
    {
        $table->dropForeign([$columnName]);
        $table->dropColumn([$columnName]);
    }
}

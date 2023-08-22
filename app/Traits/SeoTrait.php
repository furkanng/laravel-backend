<?php

namespace App\Traits;

use App\Models\LinkList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use function Laravel\Prompts\error;

trait SeoTrait
{
    public static function bootSeoTrait()
    {
        static::creating(function ($model) {
            self::seoLinkMapper($model);
            self::seoTitleMapper($model);
            self::seoDescriptionMapper($model);
            self::seoKeywordsMapper($model);
            self::linkCreate($model);
        });

        static::updating(function ($model) {
            self::seoLinkUpdateMapper($model);
            self::linkCreate($model);
        });

        static::deleting(function ($model) {
            self::linkDelete($model);
        });
    }

    public static function seoLinkMapper($model)
    {
        if (Schema::hasColumn($model->table, "seo_link")) {
            if (isset($model->seo_link)) {
                $newLink = Str::slug($model->seo_link, "-", "tr");
                $control = self::linkControl($newLink);
                if ($control) {
                    $model->seo_link = $newLink;
                } else {
                    $randLink = $newLink . "-" . rand(1, 500);
                    $model->seo_link = $randLink;
                }
            } elseif (Schema::hasColumn($model->table, "title")) {
                $newLink = Str::slug($model->title, "-", "tr");
                $control = self::linkControl($newLink);
                if ($control) {
                    $model->seo_link = $newLink;
                } else {
                    $randLink = $newLink . "-" . rand(1, 500);
                    $model->seo_link = $randLink;
                }
            } elseif (Schema::hasColumn($model->table, "name")) {
                $newLink = Str::slug($model->name, "-", "tr");
                $control = self::linkControl($newLink);
                if ($control) {
                    $model->seo_link = $newLink;
                } else {
                    $randLink = $newLink . "-" . rand(1, 500);
                    $model->seo_link = $randLink;
                }
            }
        }

    }

    public static function seoTitleMapper($model)
    {
        if (Schema::hasColumn($model->table, "seo_title")) {
            if (isset($model->seo_title)) {
                $model->seo_title = $model->seo_title;
            } elseif (Schema::hasColumn($model->table, "title")) {
                $model->seo_title = $model->title;
            } elseif (Schema::hasColumn($model->table, "name")) {
                $model->seo_title = $model->name;
            }
        }

    }

    public static function seoKeywordsMapper($model)
    {
        if (Schema::hasColumn($model->table, "seo_keywords")) {
            if (isset($model->seo_keywords)) {
                $model->seo_keywords = $model->seo_keywords;
            } elseif (Schema::hasColumn($model->table, "title")) {
                $model->seo_keywords = $model->title;
            } elseif (Schema::hasColumn($model->table, "name")) {
                $model->seo_keywords = $model->name;
            }
        }

    }

    public static function seoDescriptionMapper($model)
    {
        if (Schema::hasColumn($model->table, "seo_description")) {
            if (isset($model->seo_description)) {
                $model->seo_description = $model->seo_description;
            } elseif (Schema::hasColumn($model->table, "title")) {
                $model->seo_description = $model->title;
            } elseif (Schema::hasColumn($model->table, "name")) {
                $model->seo_description = $model->name;
            }
        }

    }


    public static function linkControl($link)
    {
        $dataLink = LinkList::query()->where("link", $link)->first();
        if ($dataLink == null) {
            return true;
        } else {
            return false;
        }
    }

    public static function linkCreate($model)
    {
        $hasLink = LinkList::query()->where("link", $model->getOriginal("seo_link"))->first();

        if ($hasLink != null) {
            $hasLink->delete();
        }

        $builder = new LinkList();

        $builder->link = ($model->seo_link);
        $builder->seo_title = ($model->seo_title);
        $builder->seo_description = ($model->seo_description);
        $builder->seo_keywords = ($model->seo_keywords);
        $builder->type = $model->table;

        $builder->save();

    }

    public static function seoLinkUpdateMapper($model)
    {
        if (Schema::hasColumn($model->table, "seo_link")) {
            $originalLink = $model->getOriginal("seo_link");
            $attributesLink = $model->getAttribute("seo_link");

            if ($originalLink !== $attributesLink) {
                $newLink = Str::slug($attributesLink, "-", "tr");
                $control = self::linkControl($newLink);
                if ($control) {
                    $model->seo_link = $newLink;
                } else {
                    $model->seo_link = $originalLink;
                }
            }
        }
    }

    public static function linkDelete($model)
    {
        if (isset($model->seo_link)) {
            LinkList::query()->where("link", $model->seo_link)->delete();
        }
    }


}

<?php

namespace App\Traits;

use App\Models\LinkList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            self::seoTitleMapper($model);
            self::seoDescriptionMapper($model);
            self::seoKeywordsMapper($model);
            self::linkCreate($model);
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

            if (Schema::hasColumn($model->table, "title")) {
                if ($originalLink !== $attributesLink) {//seo_link gönderildiyse
                    $newLink = Str::slug($attributesLink, "-", "tr");
                    $control = self::linkControl($newLink);
                    if ($control) {
                        $model->seo_link = $newLink;
                    } else {
                        return false;
                    }
                } else {//seo_link gönderilmediyse
                    $newLink = Str::slug($model->getAttribute("title"), "-", "tr");
                    $control = self::linkControl($newLink);
                    if ($control) {
                        $model->seo_link = $newLink;
                    } else {
                        return false;
                    }
                }

            } elseif (Schema::hasColumn($model->table, "name")) {
                if ($originalLink !== $attributesLink) {
                    $newLink = Str::slug($attributesLink, "-", "tr");
                    $control = self::linkControl($newLink);
                    if ($control) {
                        $model->seo_link = $newLink;
                    } else {
                        return false;
                    }
                } else {
                    $newLink = Str::slug($model->getAttribute("name"), "-", "tr");
                    $control = self::linkControl($newLink);
                    if ($control) {
                        $model->seo_link = $newLink;
                    } else {
                        return false;
                    }
                }
            }
        }
    }


}

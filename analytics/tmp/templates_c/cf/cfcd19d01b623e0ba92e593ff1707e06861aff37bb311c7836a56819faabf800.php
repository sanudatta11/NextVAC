<?php

/* @Marketplace/plugin-details.twig */
class __TwigTemplate_dd2270ffe3c3a4590a0a24c696ed23ded930e821ccaf8f7ce208c6811021310d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["marketplaceMacro"] = $this->loadTemplate("@Marketplace/macros.twig", "@Marketplace/plugin-details.twig", 1);
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"pluginDetails\">
        ";
        // line 6
        if (($context["errorMessage"] ?? $this->getContext($context, "errorMessage"))) {
            // line 7
            echo "            ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["errorMessage"] ?? $this->getContext($context, "errorMessage")), "html", null, true);
            echo "
        ";
        } elseif (        // line 8
($context["plugin"] ?? $this->getContext($context, "plugin"))) {
            // line 9
            echo "
            ";
            // line 10
            if (( !twig_test_empty($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "versions", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "versions", array()), (twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "versions", array())) - 1), array(), "array"))) {
                // line 11
                echo "                ";
                $context["latestVersion"] = $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "versions", array()), (twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "versions", array())) - 1), array(), "array");
                // line 12
                echo "            ";
            } else {
                // line 13
                echo "                ";
                $context["latestVersion"] = "";
                // line 14
                echo "            ";
            }
            // line 15
            echo "
            <div class=\"row\">
                <div class=\"col s12 m9\">
                    <h2>";
            // line 18
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "displayName", array()), "html", null, true);
            echo "</h2>
                    <p class=\"description\">
                        ";
            // line 20
            if ($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "featured", array())) {
                // line 21
                echo "                            ";
                echo $context["marketplaceMacro"]->getfeaturedIcon("left");
                echo "
                        ";
            }
            // line 23
            echo "                        ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "description", array()), "html", null, true);
            echo "
                    </p>
                    <div class=\"contentDetails\">
                        <div id=\"pluginDetailsTabs\" class=\"row\">
                            <div class=\"col s12\">
                                <ul class=\"tabs\">
                                    <li class=\"tab col s3\"><a href=\"#tabs-description\">";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
            echo "</a></li>

                                    ";
            // line 31
            if ($this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "faq", array())) {
                // line 32
                echo "                                        <li class=\"tab col s3\"><a href=\"#tabs-faq\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Faq")), "html", null, true);
                echo "</a></li>
                                    ";
            }
            // line 34
            echo "
                                    ";
            // line 35
            if ($this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "documentation", array())) {
                // line 36
                echo "                                        <li class=\"tab col s3\"><a href=\"#tabs-documentation\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Documentation")), "html", null, true);
                echo "</a></li>
                                    ";
            }
            // line 38
            echo "
                                    ";
            // line 39
            if (twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "screenshots", array()))) {
                // line 40
                echo "                                        <li class=\"tab col s3\"><a href=\"#tabs-screenshots\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_Screenshots")), "html", null, true);
                echo "</a></li>
                                    ";
            }
            // line 42
            echo "
                                    ";
            // line 43
            if ((((($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", true, true) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array())) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", false, true), "reviews", array(), "any", false, true), "embedUrl", array(), "any", true, true)) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array()))) {
                // line 44
                echo "                                        <li class=\"tab col s3\"><a href=\"#tabs-reviews\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_Reviews")), "html", null, true);
                echo "</a></li>
                                    ";
            }
            // line 46
            echo "                                </ul>
                            </div>

                            <div id=\"tabs-description\" class=\"tab-content col s12\">
                                ";
            // line 50
            if ((($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")) && ($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "isDownloadable", array()) || $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "isInstalled", array())))) {
                // line 51
                echo "                                    ";
                echo $context["marketplaceMacro"]->getmissingRequirementsPleaseUpdateNotice(($context["plugin"] ?? $this->getContext($context, "plugin")));
                echo "

                                    ";
                // line 53
                if (($context["isMultiServerEnvironment"] ?? $this->getContext($context, "isMultiServerEnvironment"))) {
                    // line 54
                    echo "                                        <div class=\"alert alert-warning\">";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_MultiServerEnvironmentWarning")), "html", null, true);
                    echo "</div>
                                    ";
                } elseif ( !                // line 55
($context["isAutoUpdateEnabled"] ?? $this->getContext($context, "isAutoUpdateEnabled"))) {
                    // line 56
                    echo "                                        <div class=\"alert alert-warning\">";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_AutoUpdateDisabledWarning", "'[General]enable_auto_update=1'", "'config/config.ini.php'")), "html", null, true);
                    echo "</div>
                                    ";
                }
                // line 58
                echo "                                ";
            }
            // line 59
            echo "
                                ";
            // line 60
            if (((($context["hasSomeAdminAccess"] ?? $this->getContext($context, "hasSomeAdminAccess")) && $this->getAttribute(($context["plugin"] ?? null), "isMissingLicense", array(), "any", true, true)) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "isMissingLicense", array()))) {
                // line 61
                echo "                                    <div class=\"alert alert-danger\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_PluginLicenseMissingDescription")), "html", null, true);
                echo "</div>
                                ";
            } elseif (((            // line 62
($context["hasSomeAdminAccess"] ?? $this->getContext($context, "hasSomeAdminAccess")) && $this->getAttribute(($context["plugin"] ?? null), "hasExceededLicense", array(), "any", true, true)) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "hasExceededLicense", array()))) {
                // line 63
                echo "                                    <div class=\"alert alert-warning\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_PluginLicenseExceededDescription")), "html", null, true);
                echo "</div>
                                ";
            }
            // line 65
            echo "
                                ";
            // line 66
            echo $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "description", array());
            echo "
                            </div>

                            ";
            // line 69
            if ($this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "faq", array())) {
                // line 70
                echo "                                <div id=\"tabs-faq\" class=\"tab-content col s12\">
                                    ";
                // line 71
                echo $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "faq", array());
                echo "
                                </div>
                            ";
            }
            // line 74
            echo "
                            ";
            // line 75
            if ($this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "documentation", array())) {
                // line 76
                echo "                                <div id=\"tabs-documentation\" class=\"tab-content col s12\">
                                    ";
                // line 77
                echo $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "readmeHtml", array()), "documentation", array());
                echo "
                                </div>
                            ";
            }
            // line 80
            echo "
                            ";
            // line 81
            if (twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "screenshots", array()))) {
                // line 82
                echo "                                <div id=\"tabs-screenshots\" class=\"tab-content col s12\">
                                    <div class=\"thumbnails\">
                                        ";
                // line 84
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "screenshots", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["screenshot"]) {
                    // line 85
                    echo "                                            <div class=\"thumbnail\">
                                                <a href=\"";
                    // line 86
                    echo \Piwik\piwik_escape_filter($this->env, $context["screenshot"], "html", null, true);
                    echo "\" target=\"_blank\"><img src=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $context["screenshot"], "html", null, true);
                    echo "?w=400\" width=\"400\" alt=\"\"></a>
                                                <p>
                                                    ";
                    // line 88
                    echo \Piwik\piwik_escape_filter($this->env, twig_replace_filter(twig_last($this->env, twig_split_filter($this->env, $context["screenshot"], "/")), array("_" => " ", ".png" => "", ".jpg" => "", ".jpeg" => "")), "html", null, true);
                    echo "
                                                </p>
                                            </div>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['screenshot'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 92
                echo "                                    </div>
                                </div>
                            ";
            }
            // line 95
            echo "
                            ";
            // line 96
            if ((((($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", true, true) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array())) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", false, true), "reviews", array(), "any", false, true), "embedUrl", array(), "any", true, true)) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array()))) {
                // line 97
                echo "                                <div id=\"tabs-reviews\" class=\"tab-content col s12\">
                                    <iframe class=\"reviewIframe\"
                                            style=\"";
                // line 99
                if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "height", array())) {
                    echo "height:";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "height", array()), "html", null, true);
                    echo "px;";
                }
                echo "\"
                                            id=\"";
                // line 100
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('md5')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array()))), "html", null, true);
                echo "\"
                                            src=\"";
                // line 101
                echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array());
                echo "\"></iframe>
                                </div>
                            ";
            }
            // line 104
            echo "                        </div>
                    </div>
                </div>
                <div class=\"col s12 m3\">
                    <div class=\"metadata\">
                        <div class=\"actionButton\">
                            ";
            // line 110
            if (( !$this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "isDownloadable", array()) ||  !($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")))) {
                // line 111
                echo "                                ";
                if ((((($context["hasSomeAdminAccess"] ?? $this->getContext($context, "hasSomeAdminAccess")) && $this->getAttribute(($context["plugin"] ?? null), "hasExceededLicense", array(), "any", true, true)) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "hasExceededLicense", array())) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "consumer", array()))) {
                    // line 112
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "consumer", array(), "any", false, true), "loginUrl", array(), "any", true, true) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "consumer", array()), "loginUrl", array()))) {
                        // line 113
                        echo "                                        <a class=\"install update\"
                                           target=\"_blank\"
                                           rel=\"noreferrer\"
                                           href=\"";
                        // line 116
                        echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "consumer", array(), "any", false, true), "loginUrl", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "consumer", array(), "any", false, true), "loginUrl", array()), "")) : ("")), "html_attr");
                        echo "\"
                                        >";
                        // line 117
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_UpgradeSubscription")), "html", null, true);
                        echo "</a>
                                    ";
                    }
                    // line 119
                    echo "
                                ";
                } elseif (((( !$this->getAttribute(                // line 120
($context["plugin"] ?? $this->getContext($context, "plugin")), "isDownloadable", array()) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "isPaid", array())) && $this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", true, true)) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()))) {
                    // line 121
                    echo "
                                    ";
                    // line 122
                    if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "variations", array()))) {
                        // line 123
                        echo "
                                        <div class=\"input-field variationPicker\">
                                            <select title=\"";
                        // line 125
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_ShownPriceIsExclTax")), "html_attr");
                        echo " ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_CurrentNumPiwikUsers", ($context["numUsers"] ?? $this->getContext($context, "numUsers")))), "html_attr");
                        echo "\">
                                                ";
                        // line 126
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "variations", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["variation"]) {
                            // line 127
                            echo "                                                    <option value=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["variation"], "addToCartUrl", array()), "html", null, true);
                            echo "\"
                                                            title=\"";
                            // line 128
                            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_PriceExclTax", $this->getAttribute($context["variation"], "price", array()), $this->getAttribute($context["variation"], "currency", array()))), "html_attr");
                            echo " ";
                            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_CurrentNumPiwikUsers", ($context["numUsers"] ?? $this->getContext($context, "numUsers")))), "html_attr");
                            echo "\"
                                                            ";
                            // line 129
                            if (($this->getAttribute($context["variation"], "recommended", array(), "any", true, true) && $this->getAttribute($context["variation"], "recommended", array()))) {
                                echo "selected";
                            }
                            // line 130
                            echo "                                                    >";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["variation"], "name", array()), "html", null, true);
                            echo " - ";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["variation"], "prettyPrice", array()), "html", null, true);
                            echo " / ";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["variation"], "period", array()), "html", null, true);
                            echo "</option>
                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variation'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 132
                        echo "                                            </select>
                                        </div>

                                        <a class=\"install update addToCartLink\" target=\"_blank\"
                                           title=\"";
                        // line 136
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_ClickToCompletePurchase")), "html_attr");
                        echo "\"
                                           rel=\"noreferrer\"
                                           href=\"";
                        // line 138
                        echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", false, true), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", false, true), "url", array()), "")) : ("")), "html_attr");
                        echo "\"
                                        >";
                        // line 139
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_AddToCart")), "html", null, true);
                        echo "</a>
                                    ";
                    } else {
                        // line 141
                        echo "                                        <a class=\"install update\" target=\"_blank\"
                                           rel=\"noreferrer\"
                                           href=\"";
                        // line 143
                        if ((($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", true, true) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "url", array()))) {
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "url", array()), "html_attr");
                        } else {
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "homepage", array()), "html_attr");
                        }
                        echo "\"
                                        >";
                        // line 144
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MoreDetails")), "html", null, true);
                        echo "</a>
                                    ";
                    }
                    // line 146
                    echo "                                ";
                }
                // line 147
                echo "                            ";
            } elseif (($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser"))) {
                // line 148
                echo "                                ";
                if ( !($context["isAutoUpdatePossible"] ?? $this->getContext($context, "isAutoUpdatePossible"))) {
                    // line 149
                    echo "                                    <a onclick=\"\$(this).css('display', 'none')\" href=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => "download", "pluginName" => $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "name", array()), "nonce" => Piwik\Nonce::getNonce($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "name", array()))))), "html", null, true);
                    echo "\"
                                       class=\"download\">";
                    // line 150
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Download")), "html", null, true);
                    echo "</a>
                                ";
                } elseif (($this->getAttribute(                // line 151
($context["plugin"] ?? $this->getContext($context, "plugin")), "canBeUpdated", array()) && (0 == twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "missingRequirements", array()))))) {
                    // line 152
                    echo "                                    <a class=\"install update\"
                                       href=\"";
                    // line 153
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "Marketplace", "action" => "updatePlugin", "pluginName" => $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "name", array()), "nonce" => ($context["updateNonce"] ?? $this->getContext($context, "updateNonce"))))), "html", null, true);
                    echo "\"
                                    >";
                    // line 154
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreUpdater_UpdateTitle")), "html", null, true);
                    echo "</a>
                                ";
                } elseif ($this->getAttribute(                // line 155
($context["plugin"] ?? $this->getContext($context, "plugin")), "isInstalled", array())) {
                    // line 156
                    echo "                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                ";
                } elseif ((0 < twig_length_filter($this->env, $this->getAttribute(                // line 160
($context["plugin"] ?? $this->getContext($context, "plugin")), "missingRequirements", array())))) {
                    // line 161
                    echo "                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                ";
                } else {
                    // line 166
                    echo "                                    <a href=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "Marketplace", "action" => "installPlugin", "pluginName" => $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "name", array()), "nonce" => ($context["installNonce"] ?? $this->getContext($context, "installNonce"))))), "html", null, true);
                    echo "\"
                                       class=\"install\">";
                    // line 167
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_ActionInstall")), "html", null, true);
                    echo "</a>
                                ";
                }
                // line 169
                echo "                            ";
            } else {
                // line 170
                echo "                                <br />
                                <br />
                                <br />
                                <br />
                            ";
            }
            // line 175
            echo "                        </div>

                        <p><br /></p>
                        <dl>
                            <dt>";
            // line 179
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Version")), "html", null, true);
            echo "</dt>
                            <dd>";
            // line 180
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "latestVersion", array()), "html", null, true);
            echo "</dd>
                            <dt>";
            // line 181
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_PluginKeywords")), "html", null, true);
            echo "</dt>
                            <dd>";
            // line 182
            echo \Piwik\piwik_escape_filter($this->env, twig_join_filter($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "keywords", array()), ", "), "html", null, true);
            echo "</dd>
                            ";
            // line 183
            if ($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "lastUpdated", array())) {
                // line 184
                echo "                                <dt>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_LastUpdated")), "html", null, true);
                echo "</dt>
                                <dd>";
                // line 185
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "lastUpdated", array()), "html", null, true);
                echo "</dd>
                            ";
            }
            // line 187
            echo "                            ";
            if ($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "numDownloads", array())) {
                // line 188
                echo "                                <dt>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Downloads")), "html", null, true);
                echo "</dt>
                                <dd title=\"";
                // line 189
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_NumDownloadsLatestVersion", twig_number_format_filter($this->env, $this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "numDownloads", array())))), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "numDownloads", array()), "html", null, true);
                echo "</dd>
                            ";
            }
            // line 191
            echo "                            <dt>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_Developer")), "html", null, true);
            echo "</dt>
                            <dd>";
            // line 192
            echo $context["marketplaceMacro"]->getpluginDeveloper($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "owner", array()));
            echo "</dd>
                            ";
            // line 193
            if (((((($context["latestVersion"] ?? $this->getContext($context, "latestVersion")) && $this->getAttribute(($context["latestVersion"] ?? null), "license", array(), "any", true, true)) && $this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array())) && $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? null), "license", array(), "any", false, true), "name", array(), "any", true, true)) && $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array()), "name", array()))) {
                // line 194
                echo "                                <dt>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_License")), "html", null, true);
                echo "</dt>
                                <dd>
                                    ";
                // line 196
                if (($this->getAttribute($this->getAttribute(($context["latestVersion"] ?? null), "license", array(), "any", false, true), "url", array(), "any", true, true) && $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array()), "url", array()))) {
                    // line 197
                    echo "                                        <a rel=\"noreferrer\"
                                           href=\"";
                    // line 198
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array()), "url", array()), "html", null, true);
                    echo "\"
                                           target=\"_blank\">";
                    // line 199
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array()), "name", array()), "html", null, true);
                    echo "</a>
                                    ";
                } else {
                    // line 201
                    echo "                                        ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["latestVersion"] ?? $this->getContext($context, "latestVersion")), "license", array()), "name", array()), "html", null, true);
                    echo "
                                    ";
                }
                // line 203
                echo "                                </dd>
                            ";
            }
            // line 205
            echo "                            <dt>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_Authors")), "html", null, true);
            echo "</dt>
                            <dd>";
            // line 206
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "authors", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
                if ($this->getAttribute($context["author"], "name", array())) {
                    // line 207
                    echo "
                                    ";
                    // line 208
                    ob_start();
                    // line 209
                    echo "                                        ";
                    if ($this->getAttribute($context["author"], "homepage", array())) {
                        // line 210
                        echo "                                            <a target=\"_blank\" rel=\"noreferrer\" href=\"";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["author"], "homepage", array()), "html", null, true);
                        echo "\">";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                        echo "</a>
                                        ";
                    } elseif ($this->getAttribute(                    // line 211
$context["author"], "email", array())) {
                        // line 212
                        echo "                                            <a href=\"mailto:";
                        echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["author"], "email", array()), "url"), "html", null, true);
                        echo "\">";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                        echo "</a>
                                        ";
                    } else {
                        // line 214
                        echo "                                            ";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                        echo "
                                        ";
                    }
                    // line 216
                    echo "
                                        ";
                    // line 217
                    if (($this->getAttribute($context["loop"], "index", array()) < twig_length_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "authors", array())))) {
                        // line 218
                        echo "                                            ,
                                        ";
                    }
                    // line 220
                    echo "                                    ";
                    echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                    // line 221
                    echo "
                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            echo "                            </dd>
                            <dt>";
            // line 224
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Websites")), "html", null, true);
            echo "</dt>
                            <dd>
                                ";
            // line 226
            if ($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "homepage", array())) {
                // line 227
                echo "                                    <a target=\"_blank\" rel=\"noreferrer\" href=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "homepage", array()), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_PluginWebsite")), "html", null, true);
                echo "</a>,
                                ";
            }
            // line 229
            echo "
                                ";
            // line 230
            if (((($this->getAttribute(($context["plugin"] ?? null), "changelog", array(), "any", true, true) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "changelog", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "changelog", array(), "any", false, true), "url", array(), "any", true, true)) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "changelog", array()), "url", array()))) {
                // line 231
                echo "                                    <a target=\"_blank\" rel=\"noreferrer\" href=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "changelog", array()), "url", array()), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Changelog")), "html", null, true);
                echo "</a>,
                                ";
            }
            // line 233
            echo "
                                <a target=\"_blank\" href=\"";
            // line 234
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "repositoryUrl", array()), "html", null, true);
            echo "\">GitHub</a>
                            </dd>

                            ";
            // line 237
            if (($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "numCommits", array()))) {
                // line 238
                echo "                                <dt>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Activity")), "html", null, true);
                echo "</dt>
                                <dd>
                                    ";
                // line 240
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "numCommits", array()), "html", null, true);
                echo " commits

                                    ";
                // line 242
                if (($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "numContributors", array()) > 1)) {
                    // line 243
                    echo "                                        ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_ByXDevelopers", $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "numContributors", array()))), "html", null, true);
                    echo "
                                    ";
                }
                // line 245
                echo "                                    ";
                if ($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "lastCommitDate", array())) {
                    // line 246
                    echo "                                        ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Marketplace_LastCommitTime", $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "activity", array()), "lastCommitDate", array()))), "html", null, true);
                    echo "
                                    ";
                }
                // line 247
                echo "</dd>
                            ";
            }
            // line 249
            echo "                        </dl>

                        ";
            // line 251
            if ( !twig_test_empty($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "support", array()))) {
                // line 252
                echo "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "support", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                    // line 253
                    echo "                                ";
                    if (($this->getAttribute($context["entry"], "name", array()) && $this->getAttribute($context["entry"], "value", array()))) {
                        // line 254
                        echo "                                    <dt>";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "name", array()), "html", null, true);
                        echo "</dt>
                                    <dd>";
                        // line 255
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "value", array()), "html", null, true);
                        echo "</dd>
                                ";
                    }
                    // line 257
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 258
                echo "                        ";
            }
            // line 259
            echo "
                        <br />
                    </div>
                </div>
            </div>

            <script type=\"text/javascript\">
                \$(function() {

                    var active = 0;
                    ";
            // line 269
            if (($context["activeTab"] ?? $this->getContext($context, "activeTab"))) {
                // line 270
                echo "                    var \$activeTab = \$('#tabs-";
                echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, ($context["activeTab"] ?? $this->getContext($context, "activeTab")), "js"), "html", null, true);
                echo "');
                    if (\$activeTab) {
                        active = \$activeTab.index() - 1;
                    }
                    ";
            }
            // line 275
            echo "
                    \$('#pluginDetailsTabs .tabs').tabs();
                    \$('#pluginDetailsTabs .tabs').tabs('select_tab', active >= 0 ? active : 0);

                    \$('.pluginDetails a').each(function (index, a) {
                        var link = \$(a).attr('href');

                        if (link && 0 === link.indexOf('http')) {
                            \$(a).attr('target', '_blank');
                        }
                    });
                });
            </script>

            ";
            // line 289
            if ((((($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", true, true) && $this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array())) && $this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array())) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? null), "shop", array(), "any", false, true), "reviews", array(), "any", false, true), "embedUrl", array(), "any", true, true)) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array()))) {
                // line 290
                echo "                <script type=\"text/javascript\">
                    \$(function() {
                        var \$iFrames = \$('.pluginDetails iframe.reviewIframe');
                        for (var i = 0; i < \$iFrames.length; i++) {
                            iFrameResize({checkOrigin: ['";
                // line 294
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('domainOnly')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute(($context["plugin"] ?? $this->getContext($context, "plugin")), "shop", array()), "reviews", array()), "embedUrl", array()))), "html", null, true);
                echo "']}, \$iFrames[i]);
                        }
                    });
                </script>
            ";
            }
            // line 299
            echo "
            <script type=\"text/javascript\">
                \$(function() {
                    var \$variationPicker = \$('.pluginDetails .variationPicker select');
                    if (\$variationPicker.val()) {
                        \$('.addToCartLink').attr('href', \$variationPicker.val());
                    }
                    \$variationPicker.on('change', function () {
                        \$('.addToCartLink').attr('href', \$variationPicker.val())
                    });

                    if (\$variationPicker.length) {
                        \$variationPicker.material_select();
                    }
                });
            </script>
        ";
        }
        // line 316
        echo "    </div>


";
    }

    public function getTemplateName()
    {
        return "@Marketplace/plugin-details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  812 => 316,  793 => 299,  785 => 294,  779 => 290,  777 => 289,  761 => 275,  752 => 270,  750 => 269,  738 => 259,  735 => 258,  729 => 257,  724 => 255,  719 => 254,  716 => 253,  711 => 252,  709 => 251,  705 => 249,  701 => 247,  695 => 246,  692 => 245,  686 => 243,  684 => 242,  679 => 240,  673 => 238,  671 => 237,  665 => 234,  662 => 233,  654 => 231,  652 => 230,  649 => 229,  641 => 227,  639 => 226,  634 => 224,  631 => 223,  620 => 221,  617 => 220,  613 => 218,  611 => 217,  608 => 216,  602 => 214,  594 => 212,  592 => 211,  585 => 210,  582 => 209,  580 => 208,  577 => 207,  566 => 206,  561 => 205,  557 => 203,  551 => 201,  546 => 199,  542 => 198,  539 => 197,  537 => 196,  531 => 194,  529 => 193,  525 => 192,  520 => 191,  513 => 189,  508 => 188,  505 => 187,  500 => 185,  495 => 184,  493 => 183,  489 => 182,  485 => 181,  481 => 180,  477 => 179,  471 => 175,  464 => 170,  461 => 169,  456 => 167,  451 => 166,  444 => 161,  442 => 160,  436 => 156,  434 => 155,  430 => 154,  426 => 153,  423 => 152,  421 => 151,  417 => 150,  412 => 149,  409 => 148,  406 => 147,  403 => 146,  398 => 144,  390 => 143,  386 => 141,  381 => 139,  377 => 138,  372 => 136,  366 => 132,  353 => 130,  349 => 129,  343 => 128,  338 => 127,  334 => 126,  328 => 125,  324 => 123,  322 => 122,  319 => 121,  317 => 120,  314 => 119,  309 => 117,  305 => 116,  300 => 113,  297 => 112,  294 => 111,  292 => 110,  284 => 104,  278 => 101,  274 => 100,  266 => 99,  262 => 97,  260 => 96,  257 => 95,  252 => 92,  242 => 88,  235 => 86,  232 => 85,  228 => 84,  224 => 82,  222 => 81,  219 => 80,  213 => 77,  210 => 76,  208 => 75,  205 => 74,  199 => 71,  196 => 70,  194 => 69,  188 => 66,  185 => 65,  179 => 63,  177 => 62,  172 => 61,  170 => 60,  167 => 59,  164 => 58,  158 => 56,  156 => 55,  151 => 54,  149 => 53,  143 => 51,  141 => 50,  135 => 46,  129 => 44,  127 => 43,  124 => 42,  118 => 40,  116 => 39,  113 => 38,  107 => 36,  105 => 35,  102 => 34,  96 => 32,  94 => 31,  89 => 29,  79 => 23,  73 => 21,  71 => 20,  66 => 18,  61 => 15,  58 => 14,  55 => 13,  52 => 12,  49 => 11,  47 => 10,  44 => 9,  42 => 8,  37 => 7,  35 => 6,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% import '@Marketplace/macros.twig' as marketplaceMacro %}

{% block content %}

    <div class=\"pluginDetails\">
        {% if errorMessage %}
            {{ errorMessage }}
        {% elseif plugin %}

            {% if plugin.versions is not empty and plugin.versions[plugin.versions|length - 1] %}
                {% set latestVersion = plugin.versions[plugin.versions|length - 1] %}
            {% else %}
                {% set latestVersion = '' %}
            {% endif %}

            <div class=\"row\">
                <div class=\"col s12 m9\">
                    <h2>{{ plugin.displayName }}</h2>
                    <p class=\"description\">
                        {% if plugin.featured %}
                            {{ marketplaceMacro.featuredIcon('left') }}
                        {% endif %}
                        {{ plugin.description }}
                    </p>
                    <div class=\"contentDetails\">
                        <div id=\"pluginDetailsTabs\" class=\"row\">
                            <div class=\"col s12\">
                                <ul class=\"tabs\">
                                    <li class=\"tab col s3\"><a href=\"#tabs-description\">{{ 'General_Description'|translate }}</a></li>

                                    {% if latestVersion.readmeHtml.faq %}
                                        <li class=\"tab col s3\"><a href=\"#tabs-faq\">{{ 'General_Faq'|translate }}</a></li>
                                    {% endif %}

                                    {% if latestVersion.readmeHtml.documentation %}
                                        <li class=\"tab col s3\"><a href=\"#tabs-documentation\">{{ 'General_Documentation'|translate }}</a></li>
                                    {% endif %}

                                    {% if plugin.screenshots|length %}
                                        <li class=\"tab col s3\"><a href=\"#tabs-screenshots\">{{ 'Marketplace_Screenshots'|translate }}</a></li>
                                    {% endif %}

                                    {% if plugin.shop is defined and plugin.shop and plugin.shop.reviews and plugin.shop.reviews.embedUrl is defined and plugin.shop.reviews.embedUrl %}
                                        <li class=\"tab col s3\"><a href=\"#tabs-reviews\">{{ 'Marketplace_Reviews'|translate }}</a></li>
                                    {% endif %}
                                </ul>
                            </div>

                            <div id=\"tabs-description\" class=\"tab-content col s12\">
                                {% if isSuperUser and (plugin.isDownloadable or plugin.isInstalled) %}
                                    {{ marketplaceMacro.missingRequirementsPleaseUpdateNotice(plugin) }}

                                    {% if isMultiServerEnvironment %}
                                        <div class=\"alert alert-warning\">{{ 'Marketplace_MultiServerEnvironmentWarning'|translate }}</div>
                                    {% elseif not isAutoUpdateEnabled %}
                                        <div class=\"alert alert-warning\">{{ 'Marketplace_AutoUpdateDisabledWarning'|translate(\"'[General]enable_auto_update=1'\", \"'config/config.ini.php'\") }}</div>
                                    {% endif %}
                                {% endif %}

                                {% if hasSomeAdminAccess and plugin.isMissingLicense is defined and plugin.isMissingLicense %}
                                    <div class=\"alert alert-danger\">{{ 'Marketplace_PluginLicenseMissingDescription'|translate }}</div>
                                {% elseif hasSomeAdminAccess and plugin.hasExceededLicense is defined and plugin.hasExceededLicense %}
                                    <div class=\"alert alert-warning\">{{ 'Marketplace_PluginLicenseExceededDescription'|translate }}</div>
                                {% endif %}

                                {{ latestVersion.readmeHtml.description|raw }}
                            </div>

                            {% if latestVersion.readmeHtml.faq %}
                                <div id=\"tabs-faq\" class=\"tab-content col s12\">
                                    {{ latestVersion.readmeHtml.faq|raw }}
                                </div>
                            {% endif %}

                            {% if latestVersion.readmeHtml.documentation %}
                                <div id=\"tabs-documentation\" class=\"tab-content col s12\">
                                    {{ latestVersion.readmeHtml.documentation|raw }}
                                </div>
                            {% endif %}

                            {% if plugin.screenshots|length %}
                                <div id=\"tabs-screenshots\" class=\"tab-content col s12\">
                                    <div class=\"thumbnails\">
                                        {% for screenshot in plugin.screenshots %}
                                            <div class=\"thumbnail\">
                                                <a href=\"{{ screenshot }}\" target=\"_blank\"><img src=\"{{ screenshot }}?w=400\" width=\"400\" alt=\"\"></a>
                                                <p>
                                                    {{ screenshot|split('/')|last|replace({'_': ' ', '.png': '', '.jpg': '', '.jpeg': ''}) }}
                                                </p>
                                            </div>
                                        {% endfor %}
                                    </div>
                                </div>
                            {% endif %}

                            {% if plugin.shop is defined and plugin.shop and plugin.shop.reviews and plugin.shop.reviews.embedUrl is defined and plugin.shop.reviews.embedUrl %}
                                <div id=\"tabs-reviews\" class=\"tab-content col s12\">
                                    <iframe class=\"reviewIframe\"
                                            style=\"{% if plugin.shop.reviews.height %}height:{{ plugin.shop.reviews.height }}px;{% endif %}\"
                                            id=\"{{ plugin.shop.reviews.embedUrl|md5 }}\"
                                            src=\"{{ plugin.shop.reviews.embedUrl|raw }}\"></iframe>
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
                <div class=\"col s12 m3\">
                    <div class=\"metadata\">
                        <div class=\"actionButton\">
                            {% if not plugin.isDownloadable or not isSuperUser %}
                                {% if hasSomeAdminAccess and plugin.hasExceededLicense is defined and plugin.hasExceededLicense and plugin.consumer %}
                                    {% if plugin.consumer.loginUrl is defined and plugin.consumer.loginUrl %}
                                        <a class=\"install update\"
                                           target=\"_blank\"
                                           rel=\"noreferrer\"
                                           href=\"{{ plugin.consumer.loginUrl|default('')|e('html_attr') }}\"
                                        >{{ 'Marketplace_UpgradeSubscription'|translate }}</a>
                                    {% endif %}

                                {% elseif not plugin.isDownloadable and plugin.isPaid and plugin.shop is defined and plugin.shop %}

                                    {% if plugin.shop.variations|length %}

                                        <div class=\"input-field variationPicker\">
                                            <select title=\"{{ 'Marketplace_ShownPriceIsExclTax'|translate|e('html_attr') }} {{ 'Marketplace_CurrentNumPiwikUsers'|translate(numUsers)|e('html_attr') }}\">
                                                {% for variation in plugin.shop.variations %}
                                                    <option value=\"{{ variation.addToCartUrl }}\"
                                                            title=\"{{ 'Marketplace_PriceExclTax'|translate(variation.price, variation.currency)|e('html_attr') }} {{ 'Marketplace_CurrentNumPiwikUsers'|translate(numUsers)|e('html_attr') }}\"
                                                            {% if variation.recommended is defined and variation.recommended %}selected{% endif %}
                                                    >{{ variation.name }} - {{ variation.prettyPrice }} / {{ variation.period }}</option>
                                                {% endfor %}
                                            </select>
                                        </div>

                                        <a class=\"install update addToCartLink\" target=\"_blank\"
                                           title=\"{{ 'Marketplace_ClickToCompletePurchase'|translate|e('html_attr') }}\"
                                           rel=\"noreferrer\"
                                           href=\"{{ plugin.shop.url|default('')|e('html_attr') }}\"
                                        >{{ 'Marketplace_AddToCart'|translate }}</a>
                                    {% else %}
                                        <a class=\"install update\" target=\"_blank\"
                                           rel=\"noreferrer\"
                                           href=\"{% if plugin.shop is defined and plugin.shop and plugin.shop.url %}{{ plugin.shop.url|e('html_attr') }}{% else %}{{ plugin.homepage|e('html_attr') }}{% endif %}\"
                                        >{{ 'General_MoreDetails'|translate }}</a>
                                    {% endif %}
                                {% endif %}
                            {% elseif isSuperUser %}
                                {% if not isAutoUpdatePossible %}
                                    <a onclick=\"\$(this).css('display', 'none')\" href=\"{{ linkTo({'action': 'download', 'pluginName': plugin.name, 'nonce': (plugin.name|nonce)}) }}\"
                                       class=\"download\">{{ 'General_Download'|translate }}</a>
                                {% elseif plugin.canBeUpdated and 0 == plugin.missingRequirements|length %}
                                    <a class=\"install update\"
                                       href=\"{{ linkTo({'module': 'Marketplace', 'action':'updatePlugin', 'pluginName': plugin.name, 'nonce': updateNonce}) }}\"
                                    >{{ 'CoreUpdater_UpdateTitle'|translate }}</a>
                                {% elseif plugin.isInstalled %}
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                {% elseif 0 < plugin.missingRequirements|length %}
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                {% else %}
                                    <a href=\"{{ linkTo({'module': 'Marketplace', 'action': 'installPlugin', 'pluginName': plugin.name, 'nonce': installNonce}) }}\"
                                       class=\"install\">{{ 'Marketplace_ActionInstall'|translate }}</a>
                                {% endif %}
                            {% else %}
                                <br />
                                <br />
                                <br />
                                <br />
                            {% endif %}
                        </div>

                        <p><br /></p>
                        <dl>
                            <dt>{{ 'CorePluginsAdmin_Version'|translate }}</dt>
                            <dd>{{ plugin.latestVersion }}</dd>
                            <dt>{{ 'Marketplace_PluginKeywords'|translate }}</dt>
                            <dd>{{ plugin.keywords|join(', ') }}</dd>
                            {% if plugin.lastUpdated %}
                                <dt>{{ 'Marketplace_LastUpdated'|translate }}</dt>
                                <dd>{{ plugin.lastUpdated }}</dd>
                            {% endif %}
                            {% if plugin.numDownloads %}
                                <dt>{{ 'General_Downloads'|translate }}</dt>
                                <dd title=\"{{ 'Marketplace_NumDownloadsLatestVersion'|translate(latestVersion.numDownloads|number_format) }}\">{{ plugin.numDownloads }}</dd>
                            {% endif %}
                            <dt>{{ 'Marketplace_Developer'|translate }}</dt>
                            <dd>{{ marketplaceMacro.pluginDeveloper(plugin.owner) }}</dd>
                            {% if latestVersion and latestVersion.license is defined and latestVersion.license and latestVersion.license.name is defined and latestVersion.license.name %}
                                <dt>{{ 'Marketplace_License'|translate }}</dt>
                                <dd>
                                    {% if latestVersion.license.url is defined and latestVersion.license.url %}
                                        <a rel=\"noreferrer\"
                                           href=\"{{ latestVersion.license.url }}\"
                                           target=\"_blank\">{{ latestVersion.license.name }}</a>
                                    {% else %}
                                        {{ latestVersion.license.name }}
                                    {% endif %}
                                </dd>
                            {% endif %}
                            <dt>{{ 'Marketplace_Authors'|translate }}</dt>
                            <dd>{% for author in plugin.authors if author.name %}

                                    {% spaceless %}
                                        {% if author.homepage %}
                                            <a target=\"_blank\" rel=\"noreferrer\" href=\"{{ author.homepage }}\">{{ author.name }}</a>
                                        {% elseif author.email %}
                                            <a href=\"mailto:{{ author.email|escape('url') }}\">{{ author.name }}</a>
                                        {% else %}
                                            {{ author.name }}
                                        {% endif %}

                                        {% if loop.index < plugin.authors|length %}
                                            ,
                                        {% endif %}
                                    {% endspaceless %}

                                {% endfor %}
                            </dd>
                            <dt>{{ 'CorePluginsAdmin_Websites'|translate }}</dt>
                            <dd>
                                {% if plugin.homepage %}
                                    <a target=\"_blank\" rel=\"noreferrer\" href=\"{{ plugin.homepage }}\">{{ 'Marketplace_PluginWebsite'|translate }}</a>,
                                {% endif %}

                                {% if plugin.changelog is defined and plugin.changelog and plugin.changelog.url is defined and plugin.changelog.url %}
                                    <a target=\"_blank\" rel=\"noreferrer\" href=\"{{ plugin.changelog.url }}\">{{ 'CorePluginsAdmin_Changelog'|translate }}</a>,
                                {% endif %}

                                <a target=\"_blank\" href=\"{{ plugin.repositoryUrl }}\">GitHub</a>
                            </dd>

                            {% if plugin.activity and plugin.activity.numCommits %}
                                <dt>{{ 'CorePluginsAdmin_Activity'|translate }}</dt>
                                <dd>
                                    {{ plugin.activity.numCommits }} commits

                                    {% if plugin.activity.numContributors > 1 %}
                                        {{ 'Marketplace_ByXDevelopers'|translate(plugin.activity.numContributors) }}
                                    {% endif %}
                                    {% if plugin.activity.lastCommitDate %}
                                        {{ 'Marketplace_LastCommitTime'|translate(plugin.activity.lastCommitDate) }}
                                    {% endif %}</dd>
                            {% endif %}
                        </dl>

                        {% if plugin.support is not empty %}
                            {% for entry in plugin.support %}
                                {% if entry.name and entry.value %}
                                    <dt>{{ entry.name }}</dt>
                                    <dd>{{ entry.value }}</dd>
                                {% endif %}
                            {% endfor %}
                        {% endif %}

                        <br />
                    </div>
                </div>
            </div>

            <script type=\"text/javascript\">
                \$(function() {

                    var active = 0;
                    {% if activeTab %}
                    var \$activeTab = \$('#tabs-{{ activeTab|e('js') }}');
                    if (\$activeTab) {
                        active = \$activeTab.index() - 1;
                    }
                    {% endif %}

                    \$('#pluginDetailsTabs .tabs').tabs();
                    \$('#pluginDetailsTabs .tabs').tabs('select_tab', active >= 0 ? active : 0);

                    \$('.pluginDetails a').each(function (index, a) {
                        var link = \$(a).attr('href');

                        if (link && 0 === link.indexOf('http')) {
                            \$(a).attr('target', '_blank');
                        }
                    });
                });
            </script>

            {% if plugin.shop is defined and plugin.shop and plugin.shop.reviews and plugin.shop.reviews.embedUrl is defined and plugin.shop.reviews.embedUrl %}
                <script type=\"text/javascript\">
                    \$(function() {
                        var \$iFrames = \$('.pluginDetails iframe.reviewIframe');
                        for (var i = 0; i < \$iFrames.length; i++) {
                            iFrameResize({checkOrigin: ['{{ plugin.shop.reviews.embedUrl|domainOnly }}']}, \$iFrames[i]);
                        }
                    });
                </script>
            {% endif %}

            <script type=\"text/javascript\">
                \$(function() {
                    var \$variationPicker = \$('.pluginDetails .variationPicker select');
                    if (\$variationPicker.val()) {
                        \$('.addToCartLink').attr('href', \$variationPicker.val());
                    }
                    \$variationPicker.on('change', function () {
                        \$('.addToCartLink').attr('href', \$variationPicker.val())
                    });

                    if (\$variationPicker.length) {
                        \$variationPicker.material_select();
                    }
                });
            </script>
        {% endif %}
    </div>


{% endblock %}
", "@Marketplace/plugin-details.twig", "/var/www/html/analytics/plugins/Marketplace/templates/plugin-details.twig");
    }
}

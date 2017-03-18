<?php

/* @Live/getVisitorProfilePopup.twig */
class __TwigTemplate_6b17bd63e902d4bd4c7618ffbda3f22a98fa95cb47f6f5e5951ebee9beed967e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ( !($context["visitorData"] ?? $this->getContext($context, "visitorData"))) {
            // line 2
            echo "    <div class=\"pk-emptyDataTable\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
            echo "</div>
";
        } else {
            // line 4
            echo "<div class=\"visitor-profile\"
     data-visitor-id=\"";
            // line 5
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getFirstRow", array(), "method"), "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
            echo "\"
     data-next-visitor=\"";
            // line 6
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "nextVisitorId", array()), "html", null, true);
            echo "\"
     data-prev-visitor=\"";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "previousVisitorId", array()), "html", null, true);
            echo "\"
     tabindex=\"0\">
    <a href class=\"visitor-profile-close\" title=\"";
            // line 9
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html", null, true);
            echo " \"></a>
    <div class=\"visitor-profile-info\">
        <div>
            <div class=\"visitor-profile-overview\">
                <div class=\"visitor-profile-avatar\">
                    <div>
                        <div class=\"visitor-profile-image-frame\">
                            <img src=\"";
            // line 16
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorAvatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorAvatar", array()), "plugins/Live/images/unknown_avatar.png")) : ("plugins/Live/images/unknown_avatar.png")), "html", null, true);
            echo "\"
                                 alt=\"";
            // line 17
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array()), "")) : ("")), "html", null, true);
            echo "\"
                                 title=\"";
            // line 18
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array()), "")) : ("")), "html", null, true);
            echo "\" />
                        </div>
                        <img src=\"plugins/Live/images/paperclip.png\" alt=\"\"/>
                    </div>
                    <div>
                        <div class=\"visitor-profile-header\">
                            ";
            // line 24
            if ( !twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "previousVisitorId", array()))) {
                echo "<a class=\"visitor-profile-prev-visitor\" href=\"#\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_PreviousVisitor")), "html", null, true);
                echo "\">&larr;</a>";
            }
            // line 25
            echo "                            <h1>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile")), "html", null, true);
            // line 26
            if ( !twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array()))) {
                echo ": <span title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UserId")), "html", null, true);
                echo ": ";
                echo $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array());
                echo "\">";
                echo $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array());
                echo "</span>";
            }
            // line 27
            echo "<img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                            </h1>
                            <a href=\"http://piwik.org/docs/user-profile/\" class=\"visitorProfileHelp\" rel=\"noreferrer\"  target=\"_blank\" title=\"";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ViewDocumentationFor", ucwords(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile"))))), "html", null, true);
            echo "\">
                                <span class=\"icon-help\"></span>
                            </a>
                            ";
            // line 32
            if ( !twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "nextVisitorId", array()))) {
                echo "<a class=\"visitor-profile-next-visitor\" href=\"#\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NextVisitor")), "html", null, true);
                echo "\">&rarr;</a>";
            }
            // line 33
            echo "                        </div>
                        <div class=\"visitor-profile-latest-visit\">
                            ";
            // line 35
            $this->loadTemplate("@Live/getSingleVisitSummary.twig", "@Live/getVisitorProfilePopup.twig", 35)->display(array_merge($context, array("visitData" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getFirstRow", array(), "method"), "getColumns", array(), "method"), "showLocation" => false)));
            // line 36
            echo "                        </div>
                    </div>
                    <p style=\"clear:both; border:none!important;\"></p>
                </div>
                <div class=\"visitor-profile-summary\">
                    <h1>";
            // line 41
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Summary")), "html", null, true);
            echo "</h1>
                    <div>
                        ";
            // line 43
            if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalPageViews", array()) != $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalActions", array()))) {
                // line 44
                echo "                            ";
                $context["actionDetails"] = array();
                // line 45
                echo "                            ";
                if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalPageViews", array()) > 0)) {
                    $context["actionDetails"] = twig_array_merge(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), array(0 => (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalPageViews", array()) . " ") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnPageviews")))));
                }
                // line 46
                echo "                            ";
                if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalEvents", array()) > 0)) {
                    $context["actionDetails"] = twig_array_merge(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), array(0 => (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalEvents", array()) . " ") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Events")))));
                }
                // line 47
                echo "                            ";
                if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalDownloads", array()) > 0)) {
                    $context["actionDetails"] = twig_array_merge(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), array(0 => (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalDownloads", array()) . " ") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Downloads")))));
                }
                // line 48
                echo "                            ";
                if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalOutlinks", array()) > 0)) {
                    $context["actionDetails"] = twig_array_merge(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), array(0 => (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalOutlinks", array()) . " ") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Outlinks")))));
                }
                // line 49
                echo "                            ";
                if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalSearches", array()) > 0)) {
                    $context["actionDetails"] = twig_array_merge(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), array(0 => (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalSearches", array()) . " ") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_ColumnSearches")))));
                }
                // line 50
                echo "                            <p>";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitSummaryWithActionDetails", (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalVisitDurationPretty", array())) . "</strong>"), "", "", ("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalActions", array())), "</strong>", twig_join_filter(($context["actionDetails"] ?? $this->getContext($context, "actionDetails")), ", "), ("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalVisits", array())), "</strong>"));
                echo "</p>
                        ";
            } else {
                // line 52
                echo "                            <p>";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitSummary", (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalVisitDurationPretty", array())) . "</strong>"), "", "", ("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalActions", array())), "</strong>", ("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalVisits", array())), "</strong>"));
                echo "</p>
                        ";
            }
            // line 54
            echo "                        <p>";
            if ($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalGoalConversions", array())) {
                echo "<strong>";
            }
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ConvertedNGoals", $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalGoalConversions", array()))), "html", null, true);
            if ($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalGoalConversions", array())) {
                echo "</strong>";
            }
            // line 55
            if ($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalGoalConversions", array())) {
                echo " (";
                // line 56
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalConversionsByGoal", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["idGoal"] => $context["totalConversions"]) {
                    // line 57
                    $context["idGoal"] = twig_slice($this->env, $context["idGoal"], 7, null);
                    // line 58
                    if ( !$this->getAttribute($context["loop"], "first", array())) {
                        echo ", ";
                    }
                    echo \Piwik\piwik_escape_filter($this->env, $context["totalConversions"], "html", null, true);
                    echo " ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["goals"] ?? $this->getContext($context, "goals")), $context["idGoal"], array(), "array"), "name", array(), "array"), "html", null, true);
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['idGoal'], $context['totalConversions'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo ")";
            }
            echo ".</p>
                        ";
            // line 61
            if ((($this->getAttribute(($context["visitorData"] ?? null), "totalSearches", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "totalSearches", array()), 0)) : (0))) {
                // line 62
                echo "                        <p>
                            ";
                // line 63
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_WidgetSearchKeywords")), "html", null, true);
                echo ":";
                // line 64
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "searches", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                    echo " <strong title=\"";
                    if (($this->getAttribute($context["entry"], "searches", array()) == 1)) {
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_OneSearch")), "html", null, true);
                    } else {
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Searches", $this->getAttribute($context["entry"], "searches", array()))), "html", null, true);
                    }
                    echo "\">";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "keyword", array()), "html", null, true);
                    echo "</strong>";
                    if ( !$this->getAttribute($context["loop"], "last", array())) {
                        echo ",";
                    }
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "                        </p>
                        ";
            }
            // line 67
            echo "                        ";
            if ($this->getAttribute(($context["visitorData"] ?? null), "averagePageGenerationTime", array(), "any", true, true)) {
                // line 68
                echo "                        <p title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_CalculatedOverNPageViews", $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalPageViewsWithTiming", array()))), "html", null, true);
                echo "\">
                            ";
                // line 69
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_AveragePageGenerationTime", (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "averagePageGenerationTime", array())) . "s</strong>")));
                echo "
                        </p>
                        ";
            }
            // line 72
            echo "                    </div>
                </div>
                ";
            // line 74
            if ($this->getAttribute(($context["visitorData"] ?? null), "totalEcommerceRevenue", array(), "any", true, true)) {
                // line 75
                echo "                <div class=\"visitor-profile-lifetimevalue\">
                    <h1>";
                // line 76
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Ecommerce")), "html", null, true);
                echo "</h1>
                    <div>
                        <p title=\"";
                // line 78
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Ecommerce_LifeTimeValueDescription", $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "visitorId", array()))), "html", null, true);
                echo "\">
                                ";
                // line 79
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Ecommerce_VisitorProfileLTV", (("<strong>" . call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalEcommerceRevenue", array()), ($context["idSite"] ?? $this->getContext($context, "idSite"))))) . "</strong>")));
                echo "
                                ";
                // line 80
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Ecommerce_VisitorProfileItemsAndOrders", (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalEcommerceItems", array())) . "</strong>"), (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalEcommerceConversions", array())) . "</strong>")));
                echo "
                        </p>
                        <p>";
                // line 83
                if (((($this->getAttribute(($context["visitorData"] ?? null), "totalAbandonedCarts", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "totalAbandonedCarts", array()), 0)) : (0)) > 0)) {
                    // line 84
                    echo "                                ";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Ecommerce_VisitorProfileAbandonedCartSummary", (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalAbandonedCarts", array())) . "</strong>"), (("<strong>" . $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalAbandonedCartsItems", array())) . "</strong>"), (("<strong>" . call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalAbandonedCartsRevenue", array()), ($context["idSite"] ?? $this->getContext($context, "idSite"))))) . "</strong>")));
                }
                // line 86
                echo "</p>
                    </div>
                </div>
                ";
            }
            // line 90
            echo "                <div class=\"visitor-profile-important-visits\">";
            // line 91
            $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
            // line 92
            echo "<div>
                        <h1>";
            // line 93
            if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "visitsAggregated", array()) == 100)) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visit")), "html", null, true);
                echo "# 100";
            } else {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_FirstVisit")), "html", null, true);
            }
            echo "</h1>
                        <div>
                            <p><strong>";
            // line 95
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "prettyDate", array()), "html", null, true);
            echo "</strong>&nbsp;- ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_DaysAgo", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "daysAgo", array()))), "html", null, true);
            echo "</p>
                            <p>
                            ";
            // line 97
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
            echo "<strong ";
            if ((($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referrerType", array()) == "search") && !twig_in_filter("(", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referralSummary", array())))) {
                echo "title=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["keywordNotDefined"] ?? $this->getContext($context, "keywordNotDefined")), "html", null, true);
                echo "\"";
            }
            echo ">";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referralSummary", array()), "html", null, true);
            echo "</strong></p>
                        </div>
                    </div>
                    ";
            // line 100
            if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getRowsCount", array(), "method") != 1)) {
                // line 101
                echo "                    <div>
                        <h1>";
                // line 102
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LastVisit")), "html", null, true);
                echo "</h1>
                        <div>
                            <p><strong>";
                // line 104
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "prettyDate", array()), "html", null, true);
                echo "</strong>&nbsp;- ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_DaysAgo", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "daysAgo", array()))), "html", null, true);
                echo "</p>
                            <p>
                                ";
                // line 106
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
                echo "<strong ";
                if ((($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referrerType", array()) == "search") && !twig_in_filter("(", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referralSummary", array())))) {
                    echo "title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["keywordNotDefined"] ?? $this->getContext($context, "keywordNotDefined")), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referralSummary", array()), "html", null, true);
                echo "</strong></p>
                        </div>
                    </div>
                    ";
            }
            // line 110
            echo "                </div>
                <div class=\"visitor-profile-location\">
                    <h1>";
            // line 112
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Location")), "html", null, true);
            echo "</h1>
                    <p>";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "countries", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 116
                ob_start();
                // line 117
                if ((($this->getAttribute($context["entry"], "cities", array(), "any", true, true) && (1 == twig_length_filter($this->env, $this->getAttribute($context["entry"], "cities", array())))) && twig_join_filter($this->getAttribute($context["entry"], "cities", array())))) {
                    // line 118
                    echo \Piwik\piwik_escape_filter($this->env, twig_join_filter($this->getAttribute($context["entry"], "cities", array())), "html", null, true);
                } elseif (($this->getAttribute(                // line 119
$context["entry"], "cities", array(), "any", true, true) && (1 < twig_length_filter($this->env, $this->getAttribute($context["entry"], "cities", array()))))) {
                    // line 120
                    echo "<span title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, twig_join_filter($this->getAttribute($context["entry"], "cities", array()), ", "), "html", null, true);
                    echo "\">";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_FromDifferentCities")), "html", null, true);
                    echo "</span>";
                }
                $context["entryCity"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 123
                echo "
                            ";
                // line 124
                ob_start();
                // line 125
                echo "<strong>
                                    ";
                // line 126
                if (($this->getAttribute($context["entry"], "nb_visits", array()) == 1)) {
                    // line 127
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OneVisit")), "html", null, true);
                } else {
                    // line 129
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute($context["entry"], "nb_visits", array()))), "html", null, true);
                }
                // line 131
                echo "</strong>";
                $context["entryVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 133
                echo "
                            ";
                // line 134
                ob_start();
                // line 135
                if (($context["entryCity"] ?? $this->getContext($context, "entryCity"))) {
                    // line 136
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_CityAndCountry", ($context["entryCity"] ?? $this->getContext($context, "entryCity")), $this->getAttribute($context["entry"], "prettyName", array())));
                } else {
                    // line 138
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "prettyName", array()), "html", null, true);
                }
                // line 141
                echo "&nbsp;<img src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "flag", array()), "html", null, true);
                echo "\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "prettyName", array()), "html", null, true);
                echo "\"/>";
                $context["entryCountry"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 144
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_XFromY", ($context["entryVisits"] ?? $this->getContext($context, "entryVisits")), ($context["entryCountry"] ?? $this->getContext($context, "entryCountry"))));
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ", ";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo "                            <a class=\"visitor-profile-show-map\" href=\"#\" ";
            if (twig_test_empty(((array_key_exists("userCountryMapUrl", $context)) ? (_twig_default_filter(($context["userCountryMapUrl"] ?? $this->getContext($context, "userCountryMapUrl")), "")) : ("")))) {
                echo "style=\"display:none\"";
            }
            echo ">(";
            echo twig_replace_filter(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ShowMap")), array(" " => "&nbsp;"));
            echo ")</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    </p>
                    <div class=\"visitor-profile-map\" style=\"display:none\" data-href=\"";
            // line 148
            echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("userCountryMapUrl", $context)) ? (_twig_default_filter(($context["userCountryMapUrl"] ?? $this->getContext($context, "userCountryMapUrl")), "")) : ("")), "html", null, true);
            echo "\">
                    </div>
                </div>
            </div>
            <div class=\"visitor-profile-visits-info\">
                <div class=\"visitor-profile-visits-container\">
                    <ol class=\"visitor-profile-visits\">
                        ";
            // line 155
            $this->loadTemplate("@Live/getVisitList.twig", "@Live/getVisitorProfilePopup.twig", 155)->display(array_merge($context, array("visits" => $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "startCounter" => 1)));
            // line 156
            echo "                    </ol>
                </div>
                <div class=\"visitor-profile-more-info\">
                    ";
            // line 159
            if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getRowsCount", array(), "method") >= twig_constant("Piwik\\Plugins\\Live\\VisitorProfile::VISITOR_PROFILE_MAX_VISITS_TO_SHOW"))) {
                // line 160
                echo "                    <a href=\"#\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LoadMoreVisits")), "html", null, true);
                echo "</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    ";
            } else {
                // line 162
                echo "                    <span class=\"visitor-profile-no-visits\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NoMoreVisits")), "html", null, true);
                echo "</span>
                    ";
            }
            // line 164
            echo "                </div>
            </div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
\$(function() { require('piwik/UI').VisitorProfileControl.initElements(); });
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@Live/getVisitorProfilePopup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  534 => 164,  528 => 162,  522 => 160,  520 => 159,  515 => 156,  513 => 155,  503 => 148,  493 => 146,  476 => 144,  469 => 141,  466 => 138,  463 => 136,  461 => 135,  459 => 134,  456 => 133,  453 => 131,  450 => 129,  447 => 127,  445 => 126,  442 => 125,  440 => 124,  437 => 123,  429 => 120,  427 => 119,  425 => 118,  423 => 117,  421 => 116,  404 => 114,  400 => 112,  396 => 110,  381 => 106,  374 => 104,  369 => 102,  366 => 101,  364 => 100,  350 => 97,  343 => 95,  333 => 93,  330 => 92,  328 => 91,  326 => 90,  320 => 86,  316 => 84,  314 => 83,  309 => 80,  305 => 79,  301 => 78,  296 => 76,  293 => 75,  291 => 74,  287 => 72,  281 => 69,  276 => 68,  273 => 67,  269 => 65,  228 => 64,  225 => 63,  222 => 62,  220 => 61,  215 => 60,  196 => 58,  194 => 57,  177 => 56,  174 => 55,  165 => 54,  159 => 52,  153 => 50,  148 => 49,  143 => 48,  138 => 47,  133 => 46,  128 => 45,  125 => 44,  123 => 43,  118 => 41,  111 => 36,  109 => 35,  105 => 33,  99 => 32,  93 => 29,  89 => 27,  79 => 26,  76 => 25,  70 => 24,  61 => 18,  57 => 17,  53 => 16,  43 => 9,  38 => 7,  34 => 6,  30 => 5,  27 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if not visitorData %}
    <div class=\"pk-emptyDataTable\">{{ 'CoreHome_ThereIsNoDataForThisReport'|translate }}</div>
{% else %}
<div class=\"visitor-profile\"
     data-visitor-id=\"{{ visitorData.lastVisits.getFirstRow().getColumn('visitorId') }}\"
     data-next-visitor=\"{{ visitorData.nextVisitorId }}\"
     data-prev-visitor=\"{{ visitorData.previousVisitorId }}\"
     tabindex=\"0\">
    <a href class=\"visitor-profile-close\" title=\"{{ 'General_Close'|translate }} \"></a>
    <div class=\"visitor-profile-info\">
        <div>
            <div class=\"visitor-profile-overview\">
                <div class=\"visitor-profile-avatar\">
                    <div>
                        <div class=\"visitor-profile-image-frame\">
                            <img src=\"{{ visitorData.visitorAvatar|default(\"plugins/Live/images/unknown_avatar.png\") }}\"
                                 alt=\"{{ visitorData.visitorDescription|default('') }}\"
                                 title=\"{{ visitorData.visitorDescription|default('') }}\" />
                        </div>
                        <img src=\"plugins/Live/images/paperclip.png\" alt=\"\"/>
                    </div>
                    <div>
                        <div class=\"visitor-profile-header\">
                            {% if visitorData.previousVisitorId is not empty %}<a class=\"visitor-profile-prev-visitor\" href=\"#\" title=\"{{ 'Live_PreviousVisitor'|translate }}\">&larr;</a>{% endif %}
                            <h1>{{ 'Live_VisitorProfile'|translate }}
                                {%- if visitorData.userId is not empty %}: <span title=\"{{'General_UserId'|translate}}: {{ visitorData.userId|raw }}\">{{ visitorData.userId|raw }}</span>{% endif -%}
                                <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                            </h1>
                            <a href=\"http://piwik.org/docs/user-profile/\" class=\"visitorProfileHelp\" rel=\"noreferrer\"  target=\"_blank\" title=\"{{ 'General_ViewDocumentationFor'|translate(\"Live_VisitorProfile\"|translate|ucwords) }}\">
                                <span class=\"icon-help\"></span>
                            </a>
                            {% if visitorData.nextVisitorId is not empty %}<a class=\"visitor-profile-next-visitor\" href=\"#\" title=\"{{ 'Live_NextVisitor'|translate }}\">&rarr;</a>{% endif %}
                        </div>
                        <div class=\"visitor-profile-latest-visit\">
                            {% include \"@Live/getSingleVisitSummary.twig\" with {'visitData': visitorData.lastVisits.getFirstRow().getColumns(), 'showLocation': false} %}
                        </div>
                    </div>
                    <p style=\"clear:both; border:none!important;\"></p>
                </div>
                <div class=\"visitor-profile-summary\">
                    <h1>{{ 'General_Summary'|translate }}</h1>
                    <div>
                        {% if visitorData.totalPageViews != visitorData.totalActions %}
                            {% set actionDetails = [] %}
                            {% if visitorData.totalPageViews > 0 %}{% set actionDetails = actionDetails|merge([visitorData.totalPageViews ~ ' ' ~ 'General_ColumnPageviews'|translate]) %}{% endif %}
                            {% if visitorData.totalEvents > 0 %}{% set actionDetails = actionDetails|merge([visitorData.totalEvents ~ ' ' ~ 'Events_Events'|translate]) %}{% endif %}
                            {% if visitorData.totalDownloads > 0 %}{% set actionDetails = actionDetails|merge([visitorData.totalDownloads ~ ' ' ~ 'General_Downloads'|translate]) %}{% endif %}
                            {% if visitorData.totalOutlinks > 0 %}{% set actionDetails = actionDetails|merge([visitorData.totalOutlinks ~ ' ' ~ 'General_Outlinks'|translate]) %}{% endif %}
                            {% if visitorData.totalSearches > 0 %}{% set actionDetails = actionDetails|merge([visitorData.totalSearches ~ ' ' ~ 'Actions_ColumnSearches'|translate]) %}{% endif %}
                            <p>{{ 'Live_VisitSummaryWithActionDetails'|translate('<strong>' ~ visitorData.totalVisitDurationPretty ~ '</strong>', '', '', '<strong>' ~ visitorData.totalActions, '</strong>', actionDetails|join(', ') , '<strong>' ~ visitorData.totalVisits, '</strong>')|raw }}</p>
                        {% else %}
                            <p>{{ 'Live_VisitSummary'|translate('<strong>' ~ visitorData.totalVisitDurationPretty ~ '</strong>', '', '', '<strong>' ~ visitorData.totalActions,  '</strong>', '<strong>' ~ visitorData.totalVisits, '</strong>')|raw }}</p>
                        {% endif %}
                        <p>{% if visitorData.totalGoalConversions %}<strong>{% endif %}{{ 'Live_ConvertedNGoals'|translate(visitorData.totalGoalConversions) }}{% if visitorData.totalGoalConversions %}</strong>{% endif %}
                        {%- if visitorData.totalGoalConversions %} (
                            {%- for idGoal, totalConversions in visitorData.totalConversionsByGoal -%}
                            {%- set idGoal = idGoal[7:] -%}
                            {%- if not loop.first %}, {% endif -%}{{- totalConversions }} {{ goals[idGoal]['name'] -}}
                            {%- endfor -%}
                        ){% endif %}.</p>
                        {% if visitorData.totalSearches|default(0) %}
                        <p>
                            {{ 'Actions_WidgetSearchKeywords'|translate }}:
                            {%- for entry in visitorData.searches %} <strong title=\"{% if entry.searches == 1 %}{{ 'Actions_OneSearch'|translate }}{% else %}{{ 'UserCountryMap_Searches'|translate(entry.searches) }}{% endif %}\">{{ entry.keyword }}</strong>{% if not loop.last %},{% endif %}{% endfor %}
                        </p>
                        {% endif %}
                        {% if visitorData.averagePageGenerationTime is defined %}
                        <p title=\"{{ 'Live_CalculatedOverNPageViews'|translate(visitorData.totalPageViewsWithTiming) }}\">
                            {{ 'Live_AveragePageGenerationTime'|translate('<strong>' ~ visitorData.averagePageGenerationTime ~ 's</strong>')|raw }}
                        </p>
                        {% endif %}
                    </div>
                </div>
                {% if visitorData.totalEcommerceRevenue is defined %}
                <div class=\"visitor-profile-lifetimevalue\">
                    <h1>{{ 'Goals_Ecommerce'|translate }}</h1>
                    <div>
                        <p title=\"{{ 'Ecommerce_LifeTimeValueDescription'|translate(visitorData.visitorId) }}\">
                                {{ 'Ecommerce_VisitorProfileLTV'|translate( \"<strong>\" ~ visitorData.totalEcommerceRevenue|money(idSite) ~ \"</strong>\")|raw }}
                                {{ 'Ecommerce_VisitorProfileItemsAndOrders'|translate(\"<strong>\" ~ visitorData.totalEcommerceItems ~ \"</strong>\", \"<strong>\" ~ visitorData.totalEcommerceConversions ~ \"</strong>\")|raw }}
                        </p>
                        <p>
                            {%- if visitorData.totalAbandonedCarts|default(0) > 0 %}
                                {{ 'Ecommerce_VisitorProfileAbandonedCartSummary'|translate('<strong>' ~ visitorData.totalAbandonedCarts ~ '</strong>', '<strong>' ~ visitorData.totalAbandonedCartsItems ~ '</strong>', '<strong>' ~ visitorData.totalAbandonedCartsRevenue|money(idSite) ~ '</strong>')|raw }}
                            {%- endif -%}
                        </p>
                    </div>
                </div>
                {% endif %}
                <div class=\"visitor-profile-important-visits\">
                    {%- set keywordNotDefined = 'General_NotDefined'|translate('General_ColumnKeyword'|translate) -%}
                    <div>
                        <h1>{% if visitorData.visitsAggregated == 100 %}{{ 'General_Visit'|translate }}# 100{% else %}{{ 'Live_FirstVisit'|translate }}{% endif %}</h1>
                        <div>
                            <p><strong>{{ visitorData.firstVisit.prettyDate }}</strong>&nbsp;- {{ 'UserCountryMap_DaysAgo'|translate(visitorData.firstVisit.daysAgo) }}</p>
                            <p>
                            {{ 'General_FromReferrer'|translate }}<strong {% if visitorData.firstVisit.referrerType == 'search' and '(' not in visitorData.firstVisit.referralSummary %}title=\"{{ keywordNotDefined }}\"{% endif %}>{{ visitorData.firstVisit.referralSummary }}</strong></p>
                        </div>
                    </div>
                    {% if visitorData.lastVisits.getRowsCount() != 1 %}
                    <div>
                        <h1>{{ 'Live_LastVisit'|translate }}</h1>
                        <div>
                            <p><strong>{{ visitorData.lastVisit.prettyDate }}</strong>&nbsp;- {{ 'UserCountryMap_DaysAgo'|translate(visitorData.lastVisit.daysAgo) }}</p>
                            <p>
                                {{ 'General_FromReferrer'|translate }}<strong {% if visitorData.lastVisit.referrerType == 'search' and '(' not in visitorData.lastVisit.referralSummary %}title=\"{{ keywordNotDefined }}\"{% endif %}>{{ visitorData.lastVisit.referralSummary }}</strong></p>
                        </div>
                    </div>
                    {% endif %}
                </div>
                <div class=\"visitor-profile-location\">
                    <h1>{{ 'UserCountry_Location'|translate }}</h1>
                    <p>
                        {%- for entry in visitorData.countries -%}

                            {% set entryCity -%}
                                {% if entry.cities is defined and 1 == entry.cities|length and entry.cities|join -%}
                                    {{ entry.cities|join }}
                                {%- elseif entry.cities is defined and 1 < entry.cities|length -%}
                                    <span title=\"{{ entry.cities|join(', ') }}\">{{ 'UserCountry_FromDifferentCities'|translate }}</span>
                                {%- endif %}
                            {%- endset %}

                            {% set entryVisits -%}
                                <strong>
                                    {% if entry.nb_visits == 1 -%}
                                        {{ 'General_OneVisit'|translate }}
                                    {%- else -%}
                                        {{ 'General_NVisits'|translate(entry.nb_visits) }}
                                    {%- endif -%}
                                </strong>
                            {%- endset %}

                            {% set entryCountry -%}
                                {%- if entryCity -%}
                                    {{ 'UserCountry_CityAndCountry'|translate(entryCity, entry.prettyName)|raw }}
                                {%- else -%}
                                    {{ entry.prettyName }}
                                {%- endif -%}

                                &nbsp;<img src=\"{{ entry.flag }}\" title=\"{{ entry.prettyName }}\"/>
                            {%- endset %}

                            {{- 'General_XFromY'|translate(entryVisits, entryCountry)|raw -}}{% if not loop.last %}, {% endif %}
                            {%- endfor %}
                            <a class=\"visitor-profile-show-map\" href=\"#\" {% if userCountryMapUrl|default('') is empty %}style=\"display:none\"{% endif %}>({{ 'Live_ShowMap'|translate|replace({' ': '&nbsp;'})|raw }})</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    </p>
                    <div class=\"visitor-profile-map\" style=\"display:none\" data-href=\"{{ userCountryMapUrl|default('') }}\">
                    </div>
                </div>
            </div>
            <div class=\"visitor-profile-visits-info\">
                <div class=\"visitor-profile-visits-container\">
                    <ol class=\"visitor-profile-visits\">
                        {% include \"@Live/getVisitList.twig\" with {'visits': visitorData.lastVisits, 'startCounter': 1} %}
                    </ol>
                </div>
                <div class=\"visitor-profile-more-info\">
                    {% if visitorData.lastVisits.getRowsCount() >= constant(\"Piwik\\\\Plugins\\\\Live\\\\VisitorProfile::VISITOR_PROFILE_MAX_VISITS_TO_SHOW\") %}
                    <a href=\"#\">{{ 'Live_LoadMoreVisits'|translate }}</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    {% else %}
                    <span class=\"visitor-profile-no-visits\">{{ 'Live_NoMoreVisits'|translate }}</span>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
\$(function() { require('piwik/UI').VisitorProfileControl.initElements(); });
</script>
{% endif %}
", "@Live/getVisitorProfilePopup.twig", "/var/www/html/analytics/plugins/Live/templates/getVisitorProfilePopup.twig");
    }
}

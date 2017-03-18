<?php

/* @Live/getSingleVisitSummary.twig */
class __TwigTemplate_609f07fd81f1ab123c3aa608f04a852c412b5af4a0a5fefa4c352030fa57060a extends Twig_Template
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
        // line 6
        $context["macros"] = $this;
        // line 7
        if (((array_key_exists("showLocation", $context)) ? (_twig_default_filter(($context["showLocation"] ?? $this->getContext($context, "showLocation")), false)) : (false))) {
            // line 8
            echo "<div class=\"visitor-profile-latest-visit-loc\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "location", array()), "html", null, true);
            echo "\">
    <img src=\"";
            // line 9
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "countryFlag", array()), "html", null, true);
            echo "\"/>&nbsp;<span>";
            if ( !twig_test_empty($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "city", array()))) {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "city", array()), "html", null, true);
            } else {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "country", array()), "html", null, true);
            }
            echo "</span>
</div>
";
        }
        // line 12
        echo "<div class=\"visitor-profile-latest-visit-column\">
    <ul>
        <li>
            <span>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_IP")), "html", null, true);
        echo "</span><strong ";
        if (($this->getAttribute(($context["visitData"] ?? null), "providerName", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "providerName", array())))) {
            echo "title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "providerName", array()), "html", null, true);
            echo "\"";
        }
        echo ">";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "visitIp", array()), "html", null, true);
        echo "</strong>
        </li>
        <li class=\"visitor-profile-id\">
            <span>";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, twig_upper_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Id"))), "html", null, true);
        echo "</span>
            ";
        // line 19
        if (array_key_exists("widgetizedLink", $context)) {
            echo "<a class=\"visitor-profile-widget-link\" href=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["widgetizedLink"] ?? $this->getContext($context, "widgetizedLink")), "html", null, true);
            echo "\" target=\"_blank\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Widgetize_OpenInNewWindow")), "html", null, true);
            echo " - ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile")), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, twig_upper_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Id"))), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "visitorId", array()), "html", null, true);
            echo "\">";
        }
        // line 20
        echo "                <strong>";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "visitorId", array()), "html", null, true);
        echo "</strong>
            ";
        // line 21
        if (array_key_exists("widgetizedLink", $context)) {
            echo "</a>";
        }
        // line 22
        echo "            <a class=\"visitor-profile-export\" href=\"";
        echo \Piwik\piwik_escape_filter($this->env, ($context["exportLink"] ?? $this->getContext($context, "exportLink")), "html", null, true);
        echo "\" target=\"_blank\" title=\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html", null, true);
        echo "\">
                <span class=\"icon-export\"></span>
            </a>
        </li>
        <li>
            ";
        // line 27
        if ($this->getAttribute(($context["visitData"] ?? null), "browserName", array(), "any", true, true)) {
            // line 28
            echo "            <div class=\"visitor-profile-browser\" title=\"";
            if ( !$this->getAttribute(($context["visitData"] ?? null), "plugins", array(), "any", true, true)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "browser", array()), "html", null, true);
            } elseif ($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "plugins", array())) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicePlugins_BrowserWithPluginsEnabled", $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "browser", array()), $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "plugins", array()))), "html", null, true);
            } else {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicePlugins_BrowserWithNoPluginsEnabled", $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "browser", array()))), "html", null, true);
            }
            echo "\">
                ";
            // line 29
            if ($this->getAttribute(($context["visitData"] ?? null), "browserIcon", array(), "any", true, true)) {
                echo "<img src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "browserIcon", array()), "html", null, true);
                echo "\" width=\"16px\" height=\"16px\"/>";
            }
            echo "<span>";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(twig_split_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "browserName", array()), " "), 0, array(), "array"), "html", null, true);
            echo "</span>
            </div>
            ";
        }
        // line 32
        echo "
            <div class=\"visitor-profile-os\">
                ";
        // line 34
        if ($this->getAttribute(($context["visitData"] ?? null), "operatingSystemIcon", array(), "any", true, true)) {
            echo "<img src=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "operatingSystemIcon", array()), "html", null, true);
            echo "\" width=\"16px\" height=\"16px\"/>";
        }
        if ($this->getAttribute(($context["visitData"] ?? null), "operatingSystem", array(), "any", true, true)) {
            echo "<span>";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "operatingSystem", array()), "html", null, true);
            echo "</span>";
        }
        // line 35
        echo "            </div>
        </li>
        ";
        // line 37
        if ($this->getAttribute(($context["visitData"] ?? null), "resolution", array(), "any", true, true)) {
            echo "<li><span>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Resolution_ColumnResolution")), "html", null, true);
            echo "</span><strong>";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "resolution", array()), "html", null, true);
            echo "</strong></li>";
        }
        // line 38
        echo "        ";
        if ( !twig_test_empty($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "userId", array()))) {
            echo "<li><span>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UserId")), "html", null, true);
            echo "</span><strong>";
            echo $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "userId", array());
            echo "</strong></li>";
        }
        // line 39
        echo "        ";
        if (array_key_exists("visitReferralSummary", $context)) {
            // line 40
            $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
            // line 41
            echo "<li>
            <span>";
            // line 42
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRangeFrom")), "html", null, true);
            echo "</span>
            <strong ";
            // line 43
            if ((($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "referrerType", array()) == "search") && !twig_in_filter("(", ($context["visitReferralSummary"] ?? $this->getContext($context, "visitReferralSummary"))))) {
                echo "title=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["keywordNotDefined"] ?? $this->getContext($context, "keywordNotDefined")), "html", null, true);
                echo "\"";
            }
            echo ">";
            echo \Piwik\piwik_escape_filter($this->env, ($context["visitReferralSummary"] ?? $this->getContext($context, "visitReferralSummary")), "html", null, true);
            echo "</strong>
        </li>
        ";
        }
        // line 46
        echo "    </ul>
</div>
<div class=\"visitor-profile-latest-visit-column\">
    ";
        // line 49
        if ($this->getAttribute(($context["visitData"] ?? null), "customVariables", array(), "any", true, true)) {
            // line 50
            echo "    <ul>
        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "customVariables", array()));
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
            foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                // line 52
                echo "        ";
                if (($this->getAttribute($context["loop"], "index0", array()) < 4)) {
                    // line 53
                    echo "            ";
                    echo $context["macros"]->getcustomVar($context["id"], $context["customVariable"]);
                    echo "
        ";
                }
                // line 55
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "    </ul>
    ";
        }
        // line 58
        echo "    ";
        if (($this->getAttribute(($context["visitData"] ?? null), "customVariables", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "customVariables", array())) > 4))) {
            // line 59
            echo "    <ul class=\"visitor-profile-extra-cvars\" style=\"display:none;\">
        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitData"] ?? $this->getContext($context, "visitData")), "customVariables", array()));
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
            foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                // line 61
                echo "        ";
                if (($this->getAttribute($context["loop"], "index0", array()) >= 4)) {
                    // line 62
                    echo "            ";
                    echo $context["macros"]->getcustomVar($context["id"], $context["customVariable"]);
                    echo "
        ";
                }
                // line 64
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "    </ul>
    <p class=\"visitor-profile-see-more-cvars\"><a href=\"#\">&#x25bc;</a></p>
    ";
        }
        // line 68
        echo "</div>
";
    }

    // line 1
    public function getcustomVar($__id__ = null, $__customVariable__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
            "customVariable" => $__customVariable__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            $context["name"] = ("customVariableName" . ($context["id"] ?? $this->getContext($context, "id")));
            // line 3
            echo "    ";
            $context["value"] = ("customVariableValue" . ($context["id"] ?? $this->getContext($context, "id")));
            // line 4
            echo "    <li><span>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute(($context["customVariable"] ?? $this->getContext($context, "customVariable")), ($context["name"] ?? $this->getContext($context, "name")), array(), "array"), 30)), "html", null, true);
            echo "</span>";
            if ((twig_length_filter($this->env, $this->getAttribute(($context["customVariable"] ?? $this->getContext($context, "customVariable")), ($context["value"] ?? $this->getContext($context, "value")), array(), "array")) > 0)) {
                echo "<strong>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute(($context["customVariable"] ?? $this->getContext($context, "customVariable")), ($context["value"] ?? $this->getContext($context, "value")), array(), "array"), 50)), "html", null, true);
                echo "</strong>";
            }
            echo "</li>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@Live/getSingleVisitSummary.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 4,  310 => 3,  307 => 2,  294 => 1,  289 => 68,  284 => 65,  270 => 64,  264 => 62,  261 => 61,  244 => 60,  241 => 59,  238 => 58,  234 => 56,  220 => 55,  214 => 53,  211 => 52,  194 => 51,  191 => 50,  189 => 49,  184 => 46,  172 => 43,  168 => 42,  165 => 41,  163 => 40,  160 => 39,  151 => 38,  143 => 37,  139 => 35,  128 => 34,  124 => 32,  112 => 29,  101 => 28,  99 => 27,  88 => 22,  84 => 21,  79 => 20,  65 => 19,  61 => 18,  45 => 15,  40 => 12,  28 => 9,  23 => 8,  21 => 7,  19 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% macro customVar(id, customVariable) %}
    {% set name='customVariableName' ~ id %}
    {% set value='customVariableValue' ~ id %}
    <li><span>{{ customVariable[name]|truncate(30) }}</span>{% if customVariable[value]|length > 0 %}<strong>{{ customVariable[value]|truncate(50) }}</strong>{% endif %}</li>
{% endmacro %}
{% import _self as macros %}
{% if showLocation|default(false) %}
<div class=\"visitor-profile-latest-visit-loc\" title=\"{{ visitData.location }}\">
    <img src=\"{{ visitData.countryFlag }}\"/>&nbsp;<span>{% if visitData.city is not empty %}{{ visitData.city }}{% else %}{{ visitData.country }}{% endif %}</span>
</div>
{% endif %}
<div class=\"visitor-profile-latest-visit-column\">
    <ul>
        <li>
            <span>{{ 'General_IP'|translate }}</span><strong {% if visitData.providerName is defined and visitData.providerName is not empty %}title=\"{{ 'Provider_ColumnProvider'|translate }}: {{ visitData.providerName }}\"{% endif %}>{{ visitData.visitIp }}</strong>
        </li>
        <li class=\"visitor-profile-id\">
            <span>{{ 'General_Id'|translate|upper }}</span>
            {% if widgetizedLink is defined %}<a class=\"visitor-profile-widget-link\" href=\"{{ widgetizedLink }}\" target=\"_blank\" title=\"{{ 'Widgetize_OpenInNewWindow'|translate }} - {{ 'Live_VisitorProfile'|translate }} {{ 'General_Id'|translate|upper }} {{ visitData.visitorId }}\">{% endif %}
                <strong>{{ visitData.visitorId }}</strong>
            {% if widgetizedLink is defined %}</a>{% endif %}
            <a class=\"visitor-profile-export\" href=\"{{ exportLink }}\" target=\"_blank\" title=\"{{ 'General_ExportThisReport'|translate }}\">
                <span class=\"icon-export\"></span>
            </a>
        </li>
        <li>
            {% if visitData.browserName is defined %}
            <div class=\"visitor-profile-browser\" title=\"{% if visitData.plugins is not defined %}{{ visitData.browser }}{% elseif visitData.plugins %}{{ 'DevicePlugins_BrowserWithPluginsEnabled'|translate(visitData.browser, visitData.plugins) }}{% else %}{{ 'DevicePlugins_BrowserWithNoPluginsEnabled'|translate(visitData.browser) }}{% endif %}\">
                {% if visitData.browserIcon is defined %}<img src=\"{{ visitData.browserIcon }}\" width=\"16px\" height=\"16px\"/>{% endif %}<span>{{ visitData.browserName|split(' ')[0] }}</span>
            </div>
            {% endif %}

            <div class=\"visitor-profile-os\">
                {% if visitData.operatingSystemIcon is defined %}<img src=\"{{ visitData.operatingSystemIcon }}\" width=\"16px\" height=\"16px\"/>{% endif %}{% if visitData.operatingSystem is defined %}<span>{{ visitData.operatingSystem }}</span>{% endif %}
            </div>
        </li>
        {% if visitData.resolution is defined %}<li><span>{{ 'Resolution_ColumnResolution'|translate }}</span><strong>{{ visitData.resolution }}</strong></li>{% endif %}
        {% if visitData.userId is not empty %}<li><span>{{ 'General_UserId'|translate }}</span><strong>{{ visitData.userId|raw }}</strong></li>{% endif %}
        {% if visitReferralSummary is defined %}
        {%- set keywordNotDefined = 'General_NotDefined'|translate('General_ColumnKeyword'|translate) -%}
        <li>
            <span>{{ 'General_DateRangeFrom'|translate }}</span>
            <strong {% if visitData.referrerType == 'search' and '(' not in visitReferralSummary %}title=\"{{ keywordNotDefined }}\"{% endif %}>{{ visitReferralSummary }}</strong>
        </li>
        {% endif %}
    </ul>
</div>
<div class=\"visitor-profile-latest-visit-column\">
    {% if visitData.customVariables is defined %}
    <ul>
        {% for id,customVariable in visitData.customVariables %}
        {% if loop.index0 < 4 %}
            {{ macros.customVar(id, customVariable) }}
        {% endif %}
        {% endfor %}
    </ul>
    {% endif %}
    {% if visitData.customVariables is defined and visitData.customVariables|length > 4 %}
    <ul class=\"visitor-profile-extra-cvars\" style=\"display:none;\">
        {% for id,customVariable in visitData.customVariables %}
        {% if loop.index0 >= 4 %}
            {{ macros.customVar(id, customVariable) }}
        {% endif %}
        {% endfor %}
    </ul>
    <p class=\"visitor-profile-see-more-cvars\"><a href=\"#\">&#x25bc;</a></p>
    {% endif %}
</div>
", "@Live/getSingleVisitSummary.twig", "/var/www/html/analytics/plugins/Live/templates/getSingleVisitSummary.twig");
    }
}

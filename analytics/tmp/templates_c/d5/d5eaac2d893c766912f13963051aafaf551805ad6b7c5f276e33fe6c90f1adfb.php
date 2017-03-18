<?php

/* @CoreHome/_dataTable.twig */
class __TwigTemplate_f76a688c09cf762b46be7cd6417117262ba4721ca795c59ee4205a325423849c extends Twig_Template
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
        if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_visualization_only", array())) {
            // line 2
            echo "    ";
            $this->loadTemplate(($context["visualizationTemplate"] ?? $this->getContext($context, "visualizationTemplate")), "@CoreHome/_dataTable.twig", 2)->display($context);
        } else {
            // line 5
            $context["isDataTableEmpty"] = (twig_test_empty(($context["dataTable"] ?? $this->getContext($context, "dataTable"))) || ((array_key_exists("dataTableHasNoData", $context)) ? (_twig_default_filter(($context["dataTableHasNoData"] ?? $this->getContext($context, "dataTableHasNoData")), false)) : (false)));
            // line 6
            echo "
";
            // line 7
            $context["showCardAsContentBlock"] = (($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_as_content_block", array()) && $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_title", array())) &&  !($context["isWidget"] ?? $this->getContext($context, "isWidget")));
            // line 8
            $context["showOnlyTitleWithoutCard"] = (( !($context["showCardAsContentBlock"] ?? $this->getContext($context, "showCardAsContentBlock")) && $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title", array())) && $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_title", array()));
            // line 9
            echo "
";
            // line 10
            if (($context["showCardAsContentBlock"] ?? $this->getContext($context, "showCardAsContentBlock"))) {
                // line 11
                echo "<div class=\"card\">
<div class=\"card-content\">
    ";
                // line 13
                if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title", array())) {
                    // line 14
                    echo "        <h2 class=\"card-title\"
            ";
                    // line 15
                    if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title_edit_entity_url", array())) {
                        echo "edit-url=\"";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title_edit_entity_url", array()), "html", null, true);
                        echo "\"";
                    }
                    // line 16
                    echo "              piwik-enriched-headline
        >";
                    // line 17
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title", array()), "html", null, true);
                    echo "</h2>
    ";
                }
            } elseif (            // line 19
($context["showOnlyTitleWithoutCard"] ?? $this->getContext($context, "showOnlyTitleWithoutCard"))) {
                // line 20
                echo "    <div>
    <h2>";
                // line 21
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "title", array()), "html", null, true);
                echo "</h2>
";
            }
            // line 23
            echo "
";
            // line 24
            $context["showCardTableIsEmpty"] = (( !$this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_as_content_block", array()) && ($context["isDataTableEmpty"] ?? $this->getContext($context, "isDataTableEmpty"))) &&  !($context["isWidget"] ?? $this->getContext($context, "isWidget")));
            // line 25
            if (($context["showCardTableIsEmpty"] ?? $this->getContext($context, "showCardTableIsEmpty"))) {
                // line 26
                echo "    <div class=\"card\">
    <div class=\"card-content\">
";
            }
            // line 29
            echo "
";
            // line 30
            $context["summaryRowId"] = twig_constant("Piwik\\DataTable::ID_SUMMARY_ROW");
            // line 31
            $context["isSubtable"] = ($this->getAttribute(($context["javascriptVariablesToSet"] ?? null), "idSubtable", array(), "any", true, true) && ($this->getAttribute(($context["javascriptVariablesToSet"] ?? $this->getContext($context, "javascriptVariablesToSet")), "idSubtable", array()) != 0));
            // line 32
            echo "<div class=\"dataTable ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["visualizationCssClass"] ?? $this->getContext($context, "visualizationCssClass")), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["properties"] ?? null), "datatable_css_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["properties"] ?? null), "datatable_css_class", array()), "")) : ("")), "html", null, true);
            echo " ";
            if (($context["isSubtable"] ?? $this->getContext($context, "isSubtable"))) {
                echo "subDataTable";
            }
            echo "\"
     data-table-type=\"";
            // line 33
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "datatable_js_type", array()), "html", null, true);
            echo "\"
     data-report=\"";
            // line 34
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "report_id", array()), "html", null, true);
            echo "\"
     data-report-metadata=\"";
            // line 35
            echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["reportMetdadata"] ?? $this->getContext($context, "reportMetdadata"))), "html_attr");
            echo "\"
     data-props=\"";
            // line 36
            if (twig_test_empty(($context["clientSideProperties"] ?? $this->getContext($context, "clientSideProperties")))) {
                echo "{}";
            } else {
                echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["clientSideProperties"] ?? $this->getContext($context, "clientSideProperties"))), "html", null, true);
            }
            echo "\"
     data-params=\"";
            // line 37
            if (twig_test_empty(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")))) {
                echo "{}";
            } else {
                echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters"))), "html", null, true);
            }
            echo "\">

    ";
            // line 39
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "description", array())) {
                // line 40
                echo "        <div class=\"card-description\">";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "description", array()), "html", null, true);
                echo "</div>
    ";
            }
            // line 42
            echo "
    <div class=\"reportDocumentation\">
        ";
            // line 44
            if ( !twig_test_empty((($this->getAttribute(($context["properties"] ?? null), "documentation", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["properties"] ?? null), "documentation", array()))) : ("")))) {
                echo "<p>";
                echo $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "documentation", array());
                echo "</p>";
            }
            // line 45
            echo "        ";
            if ((array_key_exists("reportLastUpdatedMessage", $context) && ($context["reportLastUpdatedMessage"] ?? $this->getContext($context, "reportLastUpdatedMessage")))) {
                echo "<span class='helpDate'>";
                echo ($context["reportLastUpdatedMessage"] ?? $this->getContext($context, "reportLastUpdatedMessage"));
                echo "</span>";
            }
            // line 46
            echo "    </div>

    <div class=\"dataTableWrapper\">
        ";
            // line 49
            if (array_key_exists("error", $context)) {
                // line 50
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["error"] ?? $this->getContext($context, "error")), "message", array()), "html", null, true);
                echo "
        ";
            } else {
                // line 52
                echo "            ";
                if (($context["isDataTableEmpty"] ?? $this->getContext($context, "isDataTableEmpty"))) {
                    // line 53
                    echo "                <div class=\"pk-emptyDataTable\">
                ";
                    // line 54
                    if ((array_key_exists("showReportDataWasPurgedMessage", $context) && ($context["showReportDataWasPurgedMessage"] ?? $this->getContext($context, "showReportDataWasPurgedMessage")))) {
                        // line 55
                        echo "                    ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_DataForThisReportHasBeenPurged", ($context["deleteReportsOlderThan"] ?? $this->getContext($context, "deleteReportsOlderThan")))), "html", null, true);
                        echo "
                ";
                    } else {
                        // line 57
                        echo "                    ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
                        echo "
                ";
                    }
                    // line 59
                    echo "                </div>
            ";
                } else {
                    // line 61
                    echo "                ";
                    $this->loadTemplate(($context["visualizationTemplate"] ?? $this->getContext($context, "visualizationTemplate")), "@CoreHome/_dataTable.twig", 61)->display($context);
                    // line 62
                    echo "            ";
                }
                // line 63
                echo "
            ";
                // line 64
                if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_footer", array())) {
                    // line 65
                    echo "                ";
                    $this->loadTemplate("@CoreHome/_dataTableFooter.twig", "@CoreHome/_dataTable.twig", 65)->display($context);
                    // line 66
                    echo "            ";
                }
                // line 67
                echo "
            ";
                // line 68
                $this->loadTemplate("@CoreHome/_dataTableJS.twig", "@CoreHome/_dataTable.twig", 68)->display($context);
                // line 69
                echo "        ";
            }
            // line 70
            echo "    </div>
</div>

";
            // line 73
            if (($context["showCardTableIsEmpty"] ?? $this->getContext($context, "showCardTableIsEmpty"))) {
                // line 74
                echo "    </div></div>
";
            }
            // line 76
            echo "
";
            // line 77
            if (($context["showCardAsContentBlock"] ?? $this->getContext($context, "showCardAsContentBlock"))) {
                // line 78
                echo "    </div></div>
";
            } elseif (            // line 79
($context["showOnlyTitleWithoutCard"] ?? $this->getContext($context, "showOnlyTitleWithoutCard"))) {
                // line 80
                echo "    </div>
";
            }
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 80,  237 => 79,  234 => 78,  232 => 77,  229 => 76,  225 => 74,  223 => 73,  218 => 70,  215 => 69,  213 => 68,  210 => 67,  207 => 66,  204 => 65,  202 => 64,  199 => 63,  196 => 62,  193 => 61,  189 => 59,  183 => 57,  177 => 55,  175 => 54,  172 => 53,  169 => 52,  163 => 50,  161 => 49,  156 => 46,  149 => 45,  143 => 44,  139 => 42,  133 => 40,  131 => 39,  122 => 37,  114 => 36,  110 => 35,  106 => 34,  102 => 33,  91 => 32,  89 => 31,  87 => 30,  84 => 29,  79 => 26,  77 => 25,  75 => 24,  72 => 23,  67 => 21,  64 => 20,  62 => 19,  57 => 17,  54 => 16,  48 => 15,  45 => 14,  43 => 13,  39 => 11,  37 => 10,  34 => 9,  32 => 8,  30 => 7,  27 => 6,  25 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if properties.show_visualization_only %}
    {% include visualizationTemplate %}
{%- else -%}

{% set isDataTableEmpty = (dataTable is empty or dataTableHasNoData|default(false)) %}

{% set showCardAsContentBlock = (properties.show_as_content_block and properties.show_title and not isWidget) %}
{% set showOnlyTitleWithoutCard = not showCardAsContentBlock and properties.title and properties.show_title %}

{% if showCardAsContentBlock  %}
<div class=\"card\">
<div class=\"card-content\">
    {% if properties.title %}
        <h2 class=\"card-title\"
            {% if properties.title_edit_entity_url %}edit-url=\"{{ properties.title_edit_entity_url }}\"{% endif %}
              piwik-enriched-headline
        >{{ properties.title }}</h2>
    {% endif %}
{% elseif showOnlyTitleWithoutCard %}
    <div>
    <h2>{{ properties.title }}</h2>
{% endif %}

{% set showCardTableIsEmpty = not properties.show_as_content_block and isDataTableEmpty and not isWidget %}
{% if showCardTableIsEmpty %}
    <div class=\"card\">
    <div class=\"card-content\">
{% endif %}

{% set summaryRowId = constant('Piwik\\\\DataTable::ID_SUMMARY_ROW') %}{# ID_SUMMARY_ROW #}
{% set isSubtable = javascriptVariablesToSet.idSubtable is defined and javascriptVariablesToSet.idSubtable != 0 %}
<div class=\"dataTable {{ visualizationCssClass }} {{ properties.datatable_css_class|default('') }} {% if isSubtable %}subDataTable{% endif %}\"
     data-table-type=\"{{ properties.datatable_js_type }}\"
     data-report=\"{{ properties.report_id }}\"
     data-report-metadata=\"{{ reportMetdadata|json_encode|e('html_attr') }}\"
     data-props=\"{% if clientSideProperties is empty %}{}{% else %}{{ clientSideProperties|json_encode }}{% endif %}\"
     data-params=\"{% if clientSideParameters is empty %}{}{% else %}{{ clientSideParameters|json_encode }}{% endif %}\">

    {% if properties.description %}
        <div class=\"card-description\">{{ properties.description }}</div>
    {% endif %}

    <div class=\"reportDocumentation\">
        {% if properties.documentation|default is not empty %}<p>{{ properties.documentation|raw }}</p>{% endif %}
        {% if reportLastUpdatedMessage is defined and reportLastUpdatedMessage %}<span class='helpDate'>{{ reportLastUpdatedMessage|raw }}</span>{% endif %}
    </div>

    <div class=\"dataTableWrapper\">
        {% if error is defined %}
            {{ error.message }}
        {% else %}
            {% if isDataTableEmpty %}
                <div class=\"pk-emptyDataTable\">
                {% if showReportDataWasPurgedMessage is defined and showReportDataWasPurgedMessage %}
                    {{ 'CoreHome_DataForThisReportHasBeenPurged'|translate(deleteReportsOlderThan) }}
                {% else %}
                    {{ 'CoreHome_ThereIsNoDataForThisReport'|translate }}
                {% endif %}
                </div>
            {% else %}
                {% include visualizationTemplate %}
            {% endif %}

            {% if properties.show_footer %}
                {% include \"@CoreHome/_dataTableFooter.twig\" %}
            {% endif %}

            {% include \"@CoreHome/_dataTableJS.twig\" %}
        {% endif %}
    </div>
</div>

{% if showCardTableIsEmpty %}
    </div></div>
{% endif %}

{% if showCardAsContentBlock %}
    </div></div>
{% elseif showOnlyTitleWithoutCard %}
    </div>
{% endif %}

{%- endif %}", "@CoreHome/_dataTable.twig", "/var/www/html/analytics/plugins/CoreHome/templates/_dataTable.twig");
    }
}

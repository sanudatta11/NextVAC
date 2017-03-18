<?php

/* @CoreHome/ReportRenderer/_htmlReportBody.twig */
class __TwigTemplate_dc4015e9de6aa615a7c5f59399c3fffc128804add86fe4b086e2dac87258d47b extends Twig_Template
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
        $context["fontStyle"] = "color:#0d0d0d;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Cantarell, 'Helvetica Neue', sans-serif;";
        // line 2
        $context["styleTableHeader"] = ("border-bottom:1px solid rgb(231,231,231);font-size: 15px;text-align: left;font-weight:normal;padding:13px 0 13px 10px;" . ($context["fontStyle"] ?? $this->getContext($context, "fontStyle")));
        // line 3
        $context["styleTableCell"] = ("border-bottom:1px solid rgb(231,231,231);font-size: 15px;padding:17px 15px;" . ($context["fontStyle"] ?? $this->getContext($context, "fontStyle")));
        // line 4
        echo "
<h2 id=\"";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportId"] ?? $this->getContext($context, "reportId")), "html", null, true);
        echo "\" style=\" ";
        echo \Piwik\piwik_escape_filter($this->env, ($context["fontStyle"] ?? $this->getContext($context, "fontStyle")), "html", null, true);
        echo " font-size: ";
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportTitleTextSize"] ?? $this->getContext($context, "reportTitleTextSize")), "html", null, true);
        echo "pt; font-weight:normal; margin:45px 0 30px 0;\">
    ";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportName"] ?? $this->getContext($context, "reportName")), "html", null, true);
        echo "
</h2>

";
        // line 9
        if (twig_test_empty(($context["reportRows"] ?? $this->getContext($context, "reportRows")))) {
            // line 10
            echo "    ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
            echo "
";
        } else {
            // line 12
            echo "    ";
            if (($context["displayGraph"] ?? $this->getContext($context, "displayGraph"))) {
                // line 13
                echo "        <img alt=\"\"
                ";
                // line 14
                if (($context["renderImageInline"] ?? $this->getContext($context, "renderImageInline"))) {
                    // line 15
                    echo "                    src=\"data:image/png;base64,";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["generatedImageGraph"] ?? $this->getContext($context, "generatedImageGraph")), "html", null, true);
                    echo "\"
                ";
                } else {
                    // line 17
                    echo "                    src=\"cid:";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["reportId"] ?? $this->getContext($context, "reportId")), "html", null, true);
                    echo "\"
                ";
                }
                // line 19
                echo "                height=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["graphHeight"] ?? $this->getContext($context, "graphHeight")), "html", null, true);
                echo "\"
                width=\"";
                // line 20
                echo \Piwik\piwik_escape_filter($this->env, ($context["graphWidth"] ?? $this->getContext($context, "graphWidth")), "html", null, true);
                echo "\"
                margin=\"0 auto\"/>
    ";
            }
            // line 23
            echo "
    ";
            // line 24
            if ((($context["displayGraph"] ?? $this->getContext($context, "displayGraph")) && ($context["displayTable"] ?? $this->getContext($context, "displayTable")))) {
                // line 25
                echo "        <br/>
        <br/>
    ";
            }
            // line 28
            echo "
    ";
            // line 29
            if (($context["displayTable"] ?? $this->getContext($context, "displayTable"))) {
                // line 30
                echo "        <table style=\"border-collapse:collapse; border:1px solid rgb(231,231,231); padding:5px;\">
            <thead style=\"background-color: rgb(";
                // line 31
                echo \Piwik\piwik_escape_filter($this->env, ($context["tableBgColor"] ?? $this->getContext($context, "tableBgColor")), "html", null, true);
                echo ");\">
            ";
                // line 32
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["reportColumns"] ?? $this->getContext($context, "reportColumns")));
                foreach ($context['_seq'] as $context["columnId"] => $context["columnName"]) {
                    // line 33
                    echo "                <th style=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["styleTableHeader"] ?? $this->getContext($context, "styleTableHeader")), "html", null, true);
                    if (($context["columnId"] == "label")) {
                    } else {
                        echo " text-align:right;";
                    }
                    echo "\">
                    &nbsp;";
                    // line 34
                    echo \Piwik\piwik_escape_filter($this->env, $context["columnName"], "html", null, true);
                    echo "&nbsp;&nbsp;
                </th>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['columnId'], $context['columnName'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 37
                echo "            </thead>
            <tbody>
            ";
                // line 39
                $context["cycleValues"] = array(0 => (("background-color: rgb(" . ($context["tableBgColor"] ?? $this->getContext($context, "tableBgColor"))) . ")"), 1 => "");
                // line 40
                echo "            ";
                $context["cycleIndex"] = 1;
                // line 41
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["reportRows"] ?? $this->getContext($context, "reportRows")));
                foreach ($context['_seq'] as $context["rowId"] => $context["row"]) {
                    // line 42
                    echo "                ";
                    $context["rowMetrics"] = $this->getAttribute($context["row"], "columns", array());
                    // line 43
                    echo "
                ";
                    // line 44
                    if ($this->getAttribute(($context["reportRowsMetadata"] ?? null), $context["rowId"], array(), "array", true, true)) {
                        // line 45
                        echo "                    ";
                        $context["rowMetadata"] = $this->getAttribute($this->getAttribute(($context["reportRowsMetadata"] ?? $this->getContext($context, "reportRowsMetadata")), $context["rowId"], array(), "array"), "columns", array());
                        // line 46
                        echo "                ";
                    } else {
                        // line 47
                        echo "                    ";
                        $context["rowMetadata"] = null;
                        // line 48
                        echo "                ";
                    }
                    // line 49
                    echo "                <tr style=\"";
                    echo \Piwik\piwik_escape_filter($this->env, twig_cycle(($context["cycleValues"] ?? $this->getContext($context, "cycleValues")), ($context["cycleIndex"] ?? $this->getContext($context, "cycleIndex"))), "html", null, true);
                    echo ";\">
                    ";
                    // line 50
                    $context["cycleIndex"] = (($context["cycleIndex"] ?? $this->getContext($context, "cycleIndex")) + 1);
                    // line 51
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["reportColumns"] ?? $this->getContext($context, "reportColumns")));
                    foreach ($context['_seq'] as $context["columnId"] => $context["columnName"]) {
                        // line 52
                        echo "                        <td style=\"padding:17px 15px;";
                        if (($context["columnId"] == "label")) {
                        } else {
                            echo " text-align:right;";
                        }
                        echo ";";
                        echo \Piwik\piwik_escape_filter($this->env, ($context["styleTableCell"] ?? $this->getContext($context, "styleTableCell")), "html", null, true);
                        echo "\">
                            ";
                        // line 53
                        if (($context["columnId"] == "label")) {
                            // line 54
                            echo "                                ";
                            if ($this->getAttribute(($context["rowMetrics"] ?? null), $context["columnId"], array(), "array", true, true)) {
                                // line 55
                                echo "                                    ";
                                if ($this->getAttribute(($context["rowMetadata"] ?? null), "logo", array(), "any", true, true)) {
                                    // line 56
                                    echo "                                        <img width=\"16px\" height=\"16px\" src='";
                                    echo \Piwik\piwik_escape_filter($this->env, ($context["currentPath"] ?? $this->getContext($context, "currentPath")), "html", null, true);
                                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["rowMetadata"] ?? $this->getContext($context, "rowMetadata")), "logo", array()), "html", null, true);
                                    echo "'>
                                        &nbsp;
                                    ";
                                }
                                // line 59
                                echo "                                    ";
                                if ($this->getAttribute(($context["rowMetadata"] ?? null), "url", array(), "any", true, true)) {
                                    // line 60
                                    echo "                                        <a style=\"color: rgb(";
                                    echo \Piwik\piwik_escape_filter($this->env, ($context["reportTextColor"] ?? $this->getContext($context, "reportTextColor")), "html", null, true);
                                    echo ");\" href='";
                                    if (!twig_in_filter(twig_slice($this->env, $this->getAttribute(($context["rowMetadata"] ?? $this->getContext($context, "rowMetadata")), "url", array()), 0, 4), array(0 => "http", 1 => "ftp:"))) {
                                        echo "http://";
                                    }
                                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["rowMetadata"] ?? $this->getContext($context, "rowMetadata")), "url", array()), "html", null, true);
                                    echo "'>
                                    ";
                                }
                                // line 62
                                echo "                                    ";
                                echo $this->getAttribute(($context["rowMetrics"] ?? $this->getContext($context, "rowMetrics")), $context["columnId"], array(), "array");
                                // line 63
                                echo "                                    ";
                                if ($this->getAttribute(($context["rowMetadata"] ?? null), "url", array(), "any", true, true)) {
                                    // line 64
                                    echo "                                        </a>
                                    ";
                                }
                                // line 66
                                echo "                                ";
                            }
                            // line 67
                            echo "                            ";
                        } else {
                            // line 68
                            echo "                                ";
                            if (twig_test_empty($this->getAttribute(($context["rowMetrics"] ?? $this->getContext($context, "rowMetrics")), $context["columnId"], array(), "array"))) {
                                // line 69
                                echo "                                    0
                                ";
                            } else {
                                // line 71
                                echo "                                    ";
                                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('number')->getCallable(), array($this->getAttribute(($context["rowMetrics"] ?? $this->getContext($context, "rowMetrics")), $context["columnId"], array(), "array"), 2)), "html", null, true);
                                echo "
                                ";
                            }
                            // line 73
                            echo "                            ";
                        }
                        // line 74
                        echo "                        </td>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['columnId'], $context['columnName'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "                </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['rowId'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 78
                echo "            </tbody>
        </table>
    ";
            }
            // line 81
            echo "    <p style=\"width: 100%; text-align:center;\">
      <a style=\"text-decoration:none; font-size: 9pt;\" href=\"#reportTop\">
          ";
            // line 83
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_TopOfReport")), "html", null, true);
            echo " &#8593;
    </a></p>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/ReportRenderer/_htmlReportBody.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 83,  262 => 81,  257 => 78,  250 => 76,  243 => 74,  240 => 73,  234 => 71,  230 => 69,  227 => 68,  224 => 67,  221 => 66,  217 => 64,  214 => 63,  211 => 62,  200 => 60,  197 => 59,  189 => 56,  186 => 55,  183 => 54,  181 => 53,  171 => 52,  166 => 51,  164 => 50,  159 => 49,  156 => 48,  153 => 47,  150 => 46,  147 => 45,  145 => 44,  142 => 43,  139 => 42,  134 => 41,  131 => 40,  129 => 39,  125 => 37,  116 => 34,  107 => 33,  103 => 32,  99 => 31,  96 => 30,  94 => 29,  91 => 28,  86 => 25,  84 => 24,  81 => 23,  75 => 20,  70 => 19,  64 => 17,  58 => 15,  56 => 14,  53 => 13,  50 => 12,  44 => 10,  42 => 9,  36 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set fontStyle = \"color:#0d0d0d;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Cantarell, 'Helvetica Neue', sans-serif;\"%}
{% set styleTableHeader = \"border-bottom:1px solid rgb(231,231,231);font-size: 15px;text-align: left;font-weight:normal;padding:13px 0 13px 10px;\" ~ fontStyle %}
{% set styleTableCell = \"border-bottom:1px solid rgb(231,231,231);font-size: 15px;padding:17px 15px;\" ~ fontStyle %}

<h2 id=\"{{ reportId }}\" style=\" {{fontStyle}} font-size: {{ reportTitleTextSize }}pt; font-weight:normal; margin:45px 0 30px 0;\">
    {{ reportName }}
</h2>

{% if reportRows is empty %}
    {{ 'CoreHome_ThereIsNoDataForThisReport'|translate }}
{% else %}
    {% if displayGraph %}
        <img alt=\"\"
                {% if renderImageInline %}
                    src=\"data:image/png;base64,{{ generatedImageGraph }}\"
                {% else %}
                    src=\"cid:{{ reportId }}\"
                {% endif %}
                height=\"{{ graphHeight }}\"
                width=\"{{ graphWidth }}\"
                margin=\"0 auto\"/>
    {% endif %}

    {% if displayGraph and displayTable %}
        <br/>
        <br/>
    {% endif %}

    {% if displayTable %}
        <table style=\"border-collapse:collapse; border:1px solid rgb(231,231,231); padding:5px;\">
            <thead style=\"background-color: rgb({{tableBgColor}});\">
            {% for columnId, columnName in reportColumns %}
                <th style=\"{{ styleTableHeader }}{% if columnId == 'label' %}{%  else %} text-align:right;{% endif %}\">
                    &nbsp;{{ columnName }}&nbsp;&nbsp;
                </th>
            {% endfor %}
            </thead>
            <tbody>
            {% set cycleValues=['background-color: rgb('~tableBgColor~')',''] %}
            {% set cycleIndex=1 %}
            {% for rowId,row in reportRows %}
                {% set rowMetrics=row.columns %}

                {% if reportRowsMetadata[rowId] is defined %}
                    {% set rowMetadata=reportRowsMetadata[rowId].columns %}
                {% else %}
                    {% set rowMetadata=null %}
                {% endif %}
                <tr style=\"{{ cycle(cycleValues, cycleIndex) }};\">
                    {% set cycleIndex=cycleIndex+1 %}
                    {% for columnId, columnName in reportColumns %}
                        <td style=\"padding:17px 15px;{% if columnId == 'label' %}{%  else %} text-align:right;{% endif %};{{styleTableCell}}\">
                            {% if columnId == 'label' %}
                                {% if rowMetrics[columnId] is defined %}
                                    {% if rowMetadata.logo is defined %}
                                        <img width=\"16px\" height=\"16px\" src='{{ currentPath }}{{ rowMetadata.logo }}'>
                                        &nbsp;
                                    {% endif %}
                                    {% if rowMetadata.url is defined %}
                                        <a style=\"color: rgb({{ reportTextColor }});\" href='{% if rowMetadata.url|slice(0,4) not in ['http','ftp:'] %}http://{% endif %}{{ rowMetadata.url }}'>
                                    {% endif %}
                                    {{ rowMetrics[columnId] | raw }}{# labels are escaped by SafeDecodeLabel filter in core/API/Response.php #}
                                    {% if rowMetadata.url is defined %}
                                        </a>
                                    {% endif %}
                                {% endif %}
                            {% else %}
                                {% if rowMetrics[columnId] is empty %}
                                    0
                                {% else %}
                                    {{ rowMetrics[columnId]|number(2) }}
                                {% endif %}
                            {% endif %}
                        </td>
                    {% endfor %}
                </tr>
            {% endfor %}
            </tbody>
        </table>
    {% endif %}
    <p style=\"width: 100%; text-align:center;\">
      <a style=\"text-decoration:none; font-size: 9pt;\" href=\"#reportTop\">
          {{ 'ScheduledReports_TopOfReport'|translate }} &#8593;
    </a></p>
{% endif %}
", "@CoreHome/ReportRenderer/_htmlReportBody.twig", "/var/www/html/analytics/plugins/CoreHome/templates/ReportRenderer/_htmlReportBody.twig");
    }
}

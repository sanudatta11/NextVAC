<?php

/* @ScheduledReports/_listReports.twig */
class __TwigTemplate_cb4620ea828d3da124fcaddb36254d76a433ddb60e5fb47861da10d68ce46bf8 extends Twig_Template
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
        echo "<div id='entityEditContainer' class=\"entityTableContainer\"
     piwik-content-block
     content-title=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html_attr");
        echo "\"
     help-url=\"http://piwik.org/docs/email-reports/\"
     feature=\"true\"
     ng-show=\"manageScheduledReport.showReportsList\">

    <table piwik-content-table>
        <thead>
        <tr>
            <th class=\"first\">";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
        echo "</th>
            <th>";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EmailSchedule")), "html", null, true);
        echo "</th>
            <th>";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportFormat")), "html", null, true);
        echo "</th>
            <th>";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportTo")), "html", null, true);
        echo "</th>
            <th>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Download")), "html", null, true);
        echo "</th>
            <th>";
        // line 16
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html", null, true);
        echo "</th>
            <th>";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
        echo "</th>
        </tr>
        </thead>

    ";
        // line 21
        if ((($context["userLogin"] ?? $this->getContext($context, "userLogin")) == "anonymous")) {
            // line 22
            echo "        <tr>
            <td colspan='7'>
                <br/>
                ";
            // line 25
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_MustBeLoggedIn")), "html", null, true);
            echo "
                <br/>&rsaquo; <a href='index.php?module=";
            // line 26
            echo \Piwik\piwik_escape_filter($this->env, ($context["loginModule"] ?? $this->getContext($context, "loginModule")), "html", null, true);
            echo "'>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
                <br/><br/>
            </td>
        </tr>
    ";
        } elseif (twig_test_empty(        // line 30
($context["reports"] ?? $this->getContext($context, "reports")))) {
            // line 31
            echo "        <tr>

            <td colspan='7'>
                <br/>
                ";
            // line 35
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ThereIsNoReportToManage", ($context["siteName"] ?? $this->getContext($context, "siteName"))));
            echo ".
                <br/><br/>
            </td>
        </tr>
    ";
        } else {
            // line 40
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["reports"] ?? $this->getContext($context, "reports")));
            foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                // line 41
                echo "        <tr>
            <td class=\"first\">
                ";
                // line 43
                echo $this->getAttribute($context["report"], "description", array());
                echo "
                ";
                // line 44
                if ((($context["segmentEditorActivated"] ?? $this->getContext($context, "segmentEditorActivated")) && $this->getAttribute($context["report"], "idsegment", array()))) {
                    // line 45
                    echo "                    <div class=\"entityInlineHelp\" style=\"font-size: 9pt;\">
                        ";
                    // line 46
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["savedSegmentsById"] ?? $this->getContext($context, "savedSegmentsById")), $this->getAttribute($context["report"], "idsegment", array()), array(), "array"), "html", null, true);
                    echo "
                    </div>
                ";
                }
                // line 49
                echo "            </td>
            <td>";
                // line 50
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["periods"] ?? $this->getContext($context, "periods")), $this->getAttribute($context["report"], "period", array()), array(), "array"), "html", null, true);
                echo "
                <!-- Last sent on ";
                // line 51
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "ts_last_sent", array()), "html", null, true);
                echo " -->
            </td>
            <td>
                ";
                // line 54
                if ( !twig_test_empty($this->getAttribute($context["report"], "format", array()))) {
                    // line 55
                    echo "                    ";
                    echo \Piwik\piwik_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["report"], "format", array())), "html", null, true);
                    echo "
                ";
                }
                // line 57
                echo "            </td>
            <td>
                ";
                // line 60
                echo "                ";
                if ((twig_length_filter($this->env, $this->getAttribute($context["report"], "recipients", array())) == 0)) {
                    // line 61
                    echo "                    ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_NoRecipients")), "html", null, true);
                    echo "
                ";
                } else {
                    // line 63
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["report"], "recipients", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["recipient"]) {
                        // line 64
                        echo "                        ";
                        echo \Piwik\piwik_escape_filter($this->env, $context["recipient"], "html", null, true);
                        echo "
                        <br/>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 67
                    echo "                    ";
                    // line 68
                    echo "                    <a href=\"#\"
                       ng-click=\"manageScheduledReport.sendReportNow(";
                    // line 69
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "idreport", array()), "html", null, true);
                    echo ")\"
                       name=\"linkSendNow\" class=\"link_but withIcon\" style=\"margin-top:3px;\">
                        <img border=0 src='";
                    // line 71
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["reportTypes"] ?? $this->getContext($context, "reportTypes")), $this->getAttribute($context["report"], "type", array()), array(), "array"), "html", null, true);
                    echo "'/>
                        ";
                    // line 72
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportNow")), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 75
                echo "            </td>
            <td>
                ";
                // line 78
                echo "                <a href=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "API", "segment" => null, "token_auth" => ($context["token_auth"] ?? $this->getContext($context, "token_auth")), "method" => "ScheduledReports.generateReport", "idReport" => $this->getAttribute(                // line 79
$context["report"], "idreport", array()), "outputType" =>                 // line 80
($context["downloadOutputType"] ?? $this->getContext($context, "downloadOutputType")), "language" => ($context["language"] ?? $this->getContext($context, "language")), "format" => ((twig_in_filter($this->getAttribute(                // line 81
$context["report"], "format", array()), array(0 => "html", 1 => "csv"))) ? ($this->getAttribute($context["report"], "format", array())) : (false))))), "html", null, true);
                // line 82
                echo "\"
                   rel=\"noreferrer\"  target=\"_blank\" name=\"linkDownloadReport\" id=\"";
                // line 83
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "idreport", array()), "html", null, true);
                echo "\" class=\"link_but withIcon\">
                    <img src='";
                // line 84
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["reportFormatsByReportType"] ?? $this->getContext($context, "reportFormatsByReportType")), $this->getAttribute($context["report"], "type", array()), array(), "array"), $this->getAttribute($context["report"], "format", array()), array(), "array"), "html", null, true);
                echo "' border=\"0\" width=\"16px\" height=\"16px\"/>
                    ";
                // line 85
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Download")), "html", null, true);
                echo "
                </a>
            </td>
            <td style=\"text-align: center;padding-top:2px;\">
                <button ng-click=\"manageScheduledReport.editReport(";
                // line 89
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "idreport", array()), "html", null, true);
                echo ")\"
                        class=\"table-action\" title=\"";
                // line 90
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html_attr");
                echo "\">
                    <span class=\"icon-edit\"></span>
                </button>
            </td>
            <td style=\"text-align: center;padding-top:2px;\">
                <button ng-click=\"manageScheduledReport.deleteReport(";
                // line 95
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "idreport", array()), "html", null, true);
                echo ")\"
                        class=\"table-action\" title=\"";
                // line 96
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html_attr");
                echo "\">
                    <span class=\"icon-delete\"></span>
                </button>
            </td>
        </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "    ";
        }
        // line 103
        echo "    </table>

    <div class=\"tableActionBar\">
        ";
        // line 106
        if ((($context["userLogin"] ?? $this->getContext($context, "userLogin")) != "anonymous")) {
            // line 107
            echo "            <button id=\"add-report\" ng-click=\"manageScheduledReport.createReport()\" >
                <span class=\"icon-add\"></span>
                ";
            // line 109
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateAndScheduleReport")), "html", null, true);
            echo "
            </button>
        ";
        }
        // line 112
        echo "    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/_listReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 112,  264 => 109,  260 => 107,  258 => 106,  253 => 103,  250 => 102,  238 => 96,  234 => 95,  226 => 90,  222 => 89,  215 => 85,  211 => 84,  207 => 83,  204 => 82,  202 => 81,  201 => 80,  200 => 79,  198 => 78,  194 => 75,  188 => 72,  184 => 71,  179 => 69,  176 => 68,  174 => 67,  164 => 64,  159 => 63,  153 => 61,  150 => 60,  146 => 57,  140 => 55,  138 => 54,  132 => 51,  128 => 50,  125 => 49,  119 => 46,  116 => 45,  114 => 44,  110 => 43,  106 => 41,  101 => 40,  93 => 35,  87 => 31,  85 => 30,  76 => 26,  72 => 25,  67 => 22,  65 => 21,  58 => 17,  54 => 16,  50 => 15,  46 => 14,  42 => 13,  38 => 12,  34 => 11,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id='entityEditContainer' class=\"entityTableContainer\"
     piwik-content-block
     content-title=\"{{ title|e('html_attr') }}\"
     help-url=\"http://piwik.org/docs/email-reports/\"
     feature=\"true\"
     ng-show=\"manageScheduledReport.showReportsList\">

    <table piwik-content-table>
        <thead>
        <tr>
            <th class=\"first\">{{ 'General_Description'|translate }}</th>
            <th>{{ 'ScheduledReports_EmailSchedule'|translate }}</th>
            <th>{{ 'ScheduledReports_ReportFormat'|translate }}</th>
            <th>{{ 'ScheduledReports_SendReportTo'|translate }}</th>
            <th>{{ 'General_Download'|translate }}</th>
            <th>{{ 'General_Edit'|translate }}</th>
            <th>{{ 'General_Delete'|translate }}</th>
        </tr>
        </thead>

    {% if userLogin == 'anonymous' %}
        <tr>
            <td colspan='7'>
                <br/>
                {{ 'ScheduledReports_MustBeLoggedIn'|translate }}
                <br/>&rsaquo; <a href='index.php?module={{ loginModule }}'>{{ 'Login_LogIn'|translate }}</a>
                <br/><br/>
            </td>
        </tr>
    {% elseif reports is empty %}
        <tr>

            <td colspan='7'>
                <br/>
                {{ 'ScheduledReports_ThereIsNoReportToManage'|translate(siteName)|raw }}.
                <br/><br/>
            </td>
        </tr>
    {% else %}
    {% for report in reports %}
        <tr>
            <td class=\"first\">
                {{ report.description | raw }}
                {% if segmentEditorActivated and report.idsegment %}
                    <div class=\"entityInlineHelp\" style=\"font-size: 9pt;\">
                        {{ savedSegmentsById[report.idsegment] }}
                    </div>
                {% endif %}
            </td>
            <td>{{ periods[report.period] }}
                <!-- Last sent on {{ report.ts_last_sent }} -->
            </td>
            <td>
                {% if report.format is not empty %}
                    {{ report.format|upper }}
                {% endif %}
            </td>
            <td>
                {# report recipients #}
                {% if report.recipients|length == 0 %}
                    {{ 'ScheduledReports_NoRecipients'|translate }}
                {% else %}
                    {% for recipient in report.recipients %}
                        {{ recipient }}
                        <br/>
                    {% endfor %}
                    {# send now link #}
                    <a href=\"#\"
                       ng-click=\"manageScheduledReport.sendReportNow({{ report.idreport }})\"
                       name=\"linkSendNow\" class=\"link_but withIcon\" style=\"margin-top:3px;\">
                        <img border=0 src='{{ reportTypes[report.type] }}'/>
                        {{ 'ScheduledReports_SendReportNow'|translate }}
                    </a>
                {% endif %}
            </td>
            <td>
                {# download link #}
                <a href=\"{{ linkTo({'module':'API', 'segment': null, 'token_auth':token_auth,
                            'method':'ScheduledReports.generateReport', 'idReport':report.idreport,
                            'outputType':downloadOutputType, 'language':language,
                            'format': (report.format in ['html', 'csv']) ? report.format : false
                       }) }}\"
                   rel=\"noreferrer\"  target=\"_blank\" name=\"linkDownloadReport\" id=\"{{ report.idreport }}\" class=\"link_but withIcon\">
                    <img src='{{ reportFormatsByReportType[report.type][report.format] }}' border=\"0\" width=\"16px\" height=\"16px\"/>
                    {{ 'General_Download'|translate }}
                </a>
            </td>
            <td style=\"text-align: center;padding-top:2px;\">
                <button ng-click=\"manageScheduledReport.editReport({{ report.idreport }})\"
                        class=\"table-action\" title=\"{{ 'General_Edit'|translate|e('html_attr') }}\">
                    <span class=\"icon-edit\"></span>
                </button>
            </td>
            <td style=\"text-align: center;padding-top:2px;\">
                <button ng-click=\"manageScheduledReport.deleteReport({{ report.idreport }})\"
                        class=\"table-action\" title=\"{{ 'General_Delete'|translate|e('html_attr') }}\">
                    <span class=\"icon-delete\"></span>
                </button>
            </td>
        </tr>
    {% endfor %}
    {% endif %}
    </table>

    <div class=\"tableActionBar\">
        {% if userLogin != 'anonymous' %}
            <button id=\"add-report\" ng-click=\"manageScheduledReport.createReport()\" >
                <span class=\"icon-add\"></span>
                {{ 'ScheduledReports_CreateAndScheduleReport'|translate }}
            </button>
        {% endif %}
    </div>

</div>
", "@ScheduledReports/_listReports.twig", "/var/www/html/analytics/plugins/ScheduledReports/templates/_listReports.twig");
    }
}

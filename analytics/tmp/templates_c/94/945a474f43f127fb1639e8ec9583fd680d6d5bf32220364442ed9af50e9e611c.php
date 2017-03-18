<?php

/* @ScheduledReports/_addReport.twig */
class __TwigTemplate_cfded9077aa7cb1f9aa7384435e0b3440fafd8ac64478964c7d9bdaab8a1dce3 extends Twig_Template
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
        echo "<div piwik-content-block
     content-title=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateAndScheduleReport")), "html_attr");
        echo "\"
     class=\"entityAddContainer\"
     ng-show=\"manageScheduledReport.showReportForm\">
    <div class='clear'></div>
    <form id='addEditReport' piwik-form ng-submit=\"manageScheduledReport.submitReport()\">

        <div piwik-field uicontrol=\"text\" name=\"website\"
             title=\"";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html_attr");
        echo "\"
             disabled=\"true\"
             value=\"";
        // line 11
        echo ($context["siteName"] ?? $this->getContext($context, "siteName"));
        echo "\">
        </div>

        <div piwik-field uicontrol=\"textarea\" name=\"report_description\"
             title=\"";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html_attr");
        echo "\"
             ng-model=\"manageScheduledReport.report.description\"
             inline-help=\"";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_DescriptionOnFirstPage")), "html_attr");
        echo "\">
        </div>

        ";
        // line 20
        if (($context["segmentEditorActivated"] ?? $this->getContext($context, "segmentEditorActivated"))) {
            // line 21
            echo "            <div id=\"reportSegmentInlineHelp\" class=\"inline-help-node\">
                ";
            // line 22
            ob_start();
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_DefaultAllVisits")), "html", null, true);
            $context["SegmentEditor_DefaultAllVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 23
            echo "                ";
            ob_start();
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_AddNewSegment")), "html", null, true);
            $context["SegmentEditor_AddNewSegment"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 24
            echo "                ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_Segment_Help", "<a href=\"./\" rel=\"noreferrer\"  target=\"_blank\">", "</a>", ($context["SegmentEditor_DefaultAllVisits"] ?? $this->getContext($context, "SegmentEditor_DefaultAllVisits")), ($context["SegmentEditor_AddNewSegment"] ?? $this->getContext($context, "SegmentEditor_AddNewSegment"))));
            echo "
            </div>

            <div piwik-field uicontrol=\"select\" name=\"report_segment\"
                 ng-model=\"manageScheduledReport.report.idsegment\"
                 options=\"";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["savedSegmentsById"] ?? $this->getContext($context, "savedSegmentsById"))), "html", null, true);
            echo "\"
                 title=\"";
            // line 30
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_ChooseASegment")), "html_attr");
            echo "\"
                 inline-help=\"#reportSegmentInlineHelp\">
            </div>
        ";
        }
        // line 34
        echo "
        <div id=\"emailScheduleInlineHelp\" class=\"inline-help-node\">
            ";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_WeeklyScheduleHelp")), "html", null, true);
        echo "
            <br/>
            ";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_MonthlyScheduleHelp")), "html", null, true);
        echo "
        </div>

        <div piwik-field uicontrol=\"select\" name=\"report_period\"
             options=\"";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["periods"] ?? $this->getContext($context, "periods"))), "html", null, true);
        echo "\"
             ng-model=\"manageScheduledReport.report.period\"
             title=\"";
        // line 44
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EmailSchedule")), "html_attr");
        echo "\"
             inline-help=\"#emailScheduleInlineHelp\">
        </div>

        <div piwik-field uicontrol=\"select\" name=\"report_hour\"
             options=\"manageScheduledReport.reportHours\"
             ng-change=\"manageScheduledReport.updateReportHourUtc()\"
             ng-model=\"manageScheduledReport.report.hour\"
             ";
        // line 52
        if ((($context["timeZoneDifference"] ?? $this->getContext($context, "timeZoneDifference")) != 0)) {
            echo "inline-help=\"#reportHourHelpText\"";
        }
        // line 53
        echo "             title=\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportHour", "X")), "html_attr");
        echo "\">
        </div>

        ";
        // line 56
        if ((($context["timeZoneDifference"] ?? $this->getContext($context, "timeZoneDifference")) != 0)) {
            // line 57
            echo "            <div id=\"reportHourHelpText\" class=\"inline-help-node\">
                <span ng-bind=\"manageScheduledReport.report.hourUtc\"></span>
            </div>
        ";
        }
        // line 61
        echo "
        <div piwik-field uicontrol=\"select\" name=\"report_type\"
             options=\"";
        // line 63
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["reportTypeOptions"] ?? $this->getContext($context, "reportTypeOptions"))), "html", null, true);
        echo "\"
             ng-model=\"manageScheduledReport.report.type\"
             ng-change=\"manageScheduledReport.changedReportType()\"
             ";
        // line 66
        if ((twig_length_filter($this->env, ($context["reportTypes"] ?? $this->getContext($context, "reportTypes"))) == 1)) {
            echo "disabled=\"true\"";
        }
        // line 67
        echo "             title=\"";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportType")), "html_attr");
        echo "\">
        </div>

        ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["reportFormatsByReportTypeOptions"] ?? $this->getContext($context, "reportFormatsByReportTypeOptions")));
        foreach ($context['_seq'] as $context["reportType"] => $context["reportFormats"]) {
            // line 71
            echo "            <div piwik-field uicontrol=\"select\" name=\"report_format\"
                 class=\"";
            // line 72
            echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
            echo "\"
                 ng-model=\"manageScheduledReport.report.format";
            // line 73
            echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
            echo "\"
                 ng-show=\"manageScheduledReport.report.type == '";
            // line 74
            echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
            echo "'\"
                 options=\"";
            // line 75
            echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter($context["reportFormats"]), "html", null, true);
            echo "\"
                 title=\"";
            // line 76
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportFormat")), "html_attr");
            echo "\">
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['reportType'], $context['reportFormats'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "
        ";
        // line 80
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.reportParametersScheduledReports"));
        echo "

        <div ng-show=\"manageScheduledReport.report.type == 'email' && manageScheduledReport.report.formatemail !== 'csv'\">
            <div piwik-field uicontrol=\"select\" name=\"display_format\" class=\"email\"
                 ng-model=\"manageScheduledReport.report.displayFormat\"
                 options=\"";
        // line 85
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["displayFormats"] ?? $this->getContext($context, "displayFormats"))), "html", null, true);
        echo "\"
                 introduction=\"";
        // line 86
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_AggregateReportsFormat")), "html_attr");
        echo "\">
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"report_evolution_graph\"
                 class=\"report_evolution_graph\"
                 ng-model=\"manageScheduledReport.report.evolutionGraph\"
                 ng-show=\"manageScheduledReport.report.displayFormat == '2' || manageScheduledReport.report.displayFormat == '3'\"
                 title=\"";
        // line 93
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EvolutionGraph", 5)), "html_attr");
        echo "\">
            </div>
        </div>

        <div class=\"row\">
            <h3 class=\"col s12\">";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportsIncluded")), "html", null, true);
        echo "</h3>
        </div>

        ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["reportsByCategoryByReportType"] ?? $this->getContext($context, "reportsByCategoryByReportType")));
        foreach ($context['_seq'] as $context["reportType"] => $context["reportsByCategory"]) {
            // line 102
            echo "            <div name='reportsList' class='row ";
            echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
            echo "'
                 ng-show=\"manageScheduledReport.report.type == '";
            // line 103
            echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
            echo "'\">

                ";
            // line 105
            if ($this->getAttribute(($context["allowMultipleReportsByReportType"] ?? $this->getContext($context, "allowMultipleReportsByReportType")), $context["reportType"], array(), "array")) {
                // line 106
                echo "                    ";
                $context["reportInputType"] = "checkbox";
                // line 107
                echo "                ";
            } else {
                // line 108
                echo "                    ";
                $context["reportInputType"] = "radio";
                // line 109
                echo "                ";
            }
            // line 110
            echo "
                ";
            // line 111
            $context["countCategory"] = 0;
            // line 112
            echo "
                ";
            // line 113
            $context["newColumnAfter"] = (int) floor(((twig_length_filter($this->env, $context["reportsByCategory"]) + 1) / 2));
            // line 114
            echo "
                <div class='col s12 m6'>
                    ";
            // line 116
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["reportsByCategory"]);
            foreach ($context['_seq'] as $context["category"] => $context["reports"]) {
                // line 117
                echo "                    ";
                if (((($context["countCategory"] ?? $this->getContext($context, "countCategory")) >= ($context["newColumnAfter"] ?? $this->getContext($context, "newColumnAfter"))) && (($context["newColumnAfter"] ?? $this->getContext($context, "newColumnAfter")) != 0))) {
                    // line 118
                    echo "                    ";
                    $context["newColumnAfter"] = 0;
                    // line 119
                    echo "                </div>
                <div class='col s12 m6'>
                    ";
                }
                // line 122
                echo "                    <h3 class='reportCategory'>";
                echo \Piwik\piwik_escape_filter($this->env, $context["category"], "html", null, true);
                echo "</h3>
                    <ul class='listReports'>
                        ";
                // line 124
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["reports"]);
                foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                    // line 125
                    echo "                            <li>
                                <input type='";
                    // line 126
                    echo \Piwik\piwik_escape_filter($this->env, ($context["reportInputType"] ?? $this->getContext($context, "reportInputType")), "html", null, true);
                    echo "' id=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "uniqueId", array()), "html", null, true);
                    echo "\" report-unique-id='";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "uniqueId", array()), "html", null, true);
                    echo "'
                                       name='";
                    // line 127
                    echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
                    echo "Reports'/>
                                <label for=\"";
                    // line 128
                    echo \Piwik\piwik_escape_filter($this->env, $context["reportType"], "html", null, true);
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["report"], "uniqueId", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 129
                    echo $this->getAttribute($context["report"], "name", array());
                    echo "
                                    ";
                    // line 130
                    if (($this->getAttribute($context["report"], "uniqueId", array()) == "MultiSites_getAll")) {
                        // line 131
                        echo "                                        <div class=\"entityInlineHelp\">";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportIncludeNWebsites", ($context["countWebsites"] ?? $this->getContext($context, "countWebsites")))), "html", null, true);
                        // line 132
                        echo "</div>
                                    ";
                    }
                    // line 134
                    echo "                                </label>
                            </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 137
                echo "                        ";
                $context["countCategory"] = (($context["countCategory"] ?? $this->getContext($context, "countCategory")) + 1);
                // line 138
                echo "                    </ul>
                    <br/>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['category'], $context['reports'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['reportType'], $context['reportsByCategory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "
        <input type=\"hidden\" id=\"report_idreport\" ng-model=\"manageScheduledReport.editingReportId\">

        <div ng-value=\"manageScheduledReport.saveButtonTitle\"
               onconfirm=\"manageScheduledReport.submitReport()\"
               piwik-save-button></div>

        <div class='entityCancel'>
            ";
        // line 152
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OrCancel", "<a class='entityCancelLink' ng-click='manageScheduledReport.showListOfReports()'>", "</a>"));
        echo "
        </div>

    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/_addReport.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 152,  360 => 144,  352 => 141,  344 => 138,  341 => 137,  333 => 134,  329 => 132,  326 => 131,  324 => 130,  320 => 129,  315 => 128,  311 => 127,  302 => 126,  299 => 125,  295 => 124,  289 => 122,  284 => 119,  281 => 118,  278 => 117,  274 => 116,  270 => 114,  268 => 113,  265 => 112,  263 => 111,  260 => 110,  257 => 109,  254 => 108,  251 => 107,  248 => 106,  246 => 105,  241 => 103,  236 => 102,  232 => 101,  226 => 98,  218 => 93,  208 => 86,  204 => 85,  196 => 80,  193 => 79,  184 => 76,  180 => 75,  176 => 74,  172 => 73,  168 => 72,  165 => 71,  161 => 70,  154 => 67,  150 => 66,  144 => 63,  140 => 61,  134 => 57,  132 => 56,  125 => 53,  121 => 52,  110 => 44,  105 => 42,  98 => 38,  93 => 36,  89 => 34,  82 => 30,  78 => 29,  69 => 24,  64 => 23,  60 => 22,  57 => 21,  55 => 20,  49 => 17,  44 => 15,  37 => 11,  32 => 9,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div piwik-content-block
     content-title=\"{{ 'ScheduledReports_CreateAndScheduleReport'|translate|e('html_attr') }}\"
     class=\"entityAddContainer\"
     ng-show=\"manageScheduledReport.showReportForm\">
    <div class='clear'></div>
    <form id='addEditReport' piwik-form ng-submit=\"manageScheduledReport.submitReport()\">

        <div piwik-field uicontrol=\"text\" name=\"website\"
             title=\"{{ 'General_Website'|translate|e('html_attr') }}\"
             disabled=\"true\"
             value=\"{{ siteName|raw }}\">
        </div>

        <div piwik-field uicontrol=\"textarea\" name=\"report_description\"
             title=\"{{ 'General_Description'|translate|e('html_attr') }}\"
             ng-model=\"manageScheduledReport.report.description\"
             inline-help=\"{{ 'ScheduledReports_DescriptionOnFirstPage'|translate|e('html_attr') }}\">
        </div>

        {% if segmentEditorActivated %}
            <div id=\"reportSegmentInlineHelp\" class=\"inline-help-node\">
                {% set SegmentEditor_DefaultAllVisits %}{{ 'SegmentEditor_DefaultAllVisits'|translate }}{% endset %}
                {% set SegmentEditor_AddNewSegment %}{{ 'SegmentEditor_AddNewSegment'|translate }}{% endset %}
                {{ 'ScheduledReports_Segment_Help'|translate('<a href=\"./\" rel=\"noreferrer\"  target=\"_blank\">','</a>',SegmentEditor_DefaultAllVisits,SegmentEditor_AddNewSegment)|raw }}
            </div>

            <div piwik-field uicontrol=\"select\" name=\"report_segment\"
                 ng-model=\"manageScheduledReport.report.idsegment\"
                 options=\"{{ savedSegmentsById|json_encode }}\"
                 title=\"{{ 'SegmentEditor_ChooseASegment'|translate|e('html_attr') }}\"
                 inline-help=\"#reportSegmentInlineHelp\">
            </div>
        {% endif %}

        <div id=\"emailScheduleInlineHelp\" class=\"inline-help-node\">
            {{ 'ScheduledReports_WeeklyScheduleHelp'|translate }}
            <br/>
            {{ 'ScheduledReports_MonthlyScheduleHelp'|translate }}
        </div>

        <div piwik-field uicontrol=\"select\" name=\"report_period\"
             options=\"{{ periods|json_encode }}\"
             ng-model=\"manageScheduledReport.report.period\"
             title=\"{{ 'ScheduledReports_EmailSchedule'|translate|e('html_attr') }}\"
             inline-help=\"#emailScheduleInlineHelp\">
        </div>

        <div piwik-field uicontrol=\"select\" name=\"report_hour\"
             options=\"manageScheduledReport.reportHours\"
             ng-change=\"manageScheduledReport.updateReportHourUtc()\"
             ng-model=\"manageScheduledReport.report.hour\"
             {% if timeZoneDifference != 0 %}inline-help=\"#reportHourHelpText\"{% endif %}
             title=\"{{ 'ScheduledReports_ReportHour'|translate('X')|e('html_attr') }}\">
        </div>

        {% if timeZoneDifference != 0 %}
            <div id=\"reportHourHelpText\" class=\"inline-help-node\">
                <span ng-bind=\"manageScheduledReport.report.hourUtc\"></span>
            </div>
        {% endif %}

        <div piwik-field uicontrol=\"select\" name=\"report_type\"
             options=\"{{ reportTypeOptions|json_encode }}\"
             ng-model=\"manageScheduledReport.report.type\"
             ng-change=\"manageScheduledReport.changedReportType()\"
             {% if reportTypes|length == 1 %}disabled=\"true\"{% endif %}
             title=\"{{ 'ScheduledReports_ReportType'|translate|e('html_attr') }}\">
        </div>

        {% for reportType, reportFormats in reportFormatsByReportTypeOptions %}
            <div piwik-field uicontrol=\"select\" name=\"report_format\"
                 class=\"{{ reportType }}\"
                 ng-model=\"manageScheduledReport.report.format{{ reportType }}\"
                 ng-show=\"manageScheduledReport.report.type == '{{ reportType }}'\"
                 options=\"{{ reportFormats|json_encode }}\"
                 title=\"{{ 'ScheduledReports_ReportFormat'|translate|e('html_attr') }}\">
            </div>
        {% endfor %}

        {{ postEvent(\"Template.reportParametersScheduledReports\") }}

        <div ng-show=\"manageScheduledReport.report.type == 'email' && manageScheduledReport.report.formatemail !== 'csv'\">
            <div piwik-field uicontrol=\"select\" name=\"display_format\" class=\"email\"
                 ng-model=\"manageScheduledReport.report.displayFormat\"
                 options=\"{{ displayFormats|json_encode }}\"
                 introduction=\"{{ 'ScheduledReports_AggregateReportsFormat'|translate|e('html_attr') }}\">
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"report_evolution_graph\"
                 class=\"report_evolution_graph\"
                 ng-model=\"manageScheduledReport.report.evolutionGraph\"
                 ng-show=\"manageScheduledReport.report.displayFormat == '2' || manageScheduledReport.report.displayFormat == '3'\"
                 title=\"{{ 'ScheduledReports_EvolutionGraph'|translate(5)|e('html_attr') }}\">
            </div>
        </div>

        <div class=\"row\">
            <h3 class=\"col s12\">{{ 'ScheduledReports_ReportsIncluded'|translate }}</h3>
        </div>

        {% for reportType, reportsByCategory in reportsByCategoryByReportType %}
            <div name='reportsList' class='row {{ reportType }}'
                 ng-show=\"manageScheduledReport.report.type == '{{ reportType }}'\">

                {% if allowMultipleReportsByReportType[reportType] %}
                    {% set reportInputType='checkbox' %}
                {% else %}
                    {% set reportInputType='radio' %}
                {% endif %}

                {% set countCategory=0 %}

                {% set newColumnAfter=(reportsByCategory|length + 1)//2 %}

                <div class='col s12 m6'>
                    {% for category, reports in reportsByCategory %}
                    {% if countCategory >= newColumnAfter and newColumnAfter != 0 %}
                    {% set newColumnAfter=0 %}
                </div>
                <div class='col s12 m6'>
                    {% endif %}
                    <h3 class='reportCategory'>{{ category }}</h3>
                    <ul class='listReports'>
                        {% for report in reports %}
                            <li>
                                <input type='{{ reportInputType }}' id=\"{{ reportType }}{{ report.uniqueId }}\" report-unique-id='{{ report.uniqueId }}'
                                       name='{{ reportType }}Reports'/>
                                <label for=\"{{ reportType }}{{ report.uniqueId }}\">
                                    {{ report.name|raw }}
                                    {% if report.uniqueId=='MultiSites_getAll' %}
                                        <div class=\"entityInlineHelp\">{{ 'ScheduledReports_ReportIncludeNWebsites'|translate(countWebsites)
                                            }}</div>
                                    {% endif %}
                                </label>
                            </li>
                        {% endfor %}
                        {% set countCategory=countCategory+1 %}
                    </ul>
                    <br/>
                    {% endfor %}
                </div>
            </div>
        {% endfor %}

        <input type=\"hidden\" id=\"report_idreport\" ng-model=\"manageScheduledReport.editingReportId\">

        <div ng-value=\"manageScheduledReport.saveButtonTitle\"
               onconfirm=\"manageScheduledReport.submitReport()\"
               piwik-save-button></div>

        <div class='entityCancel'>
            {{ 'General_OrCancel'|translate(\"<a class='entityCancelLink' ng-click='manageScheduledReport.showListOfReports()'>\",\"</a>\")|raw }}
        </div>

    </form>
</div>
", "@ScheduledReports/_addReport.twig", "/var/www/html/analytics/plugins/ScheduledReports/templates/_addReport.twig");
    }
}

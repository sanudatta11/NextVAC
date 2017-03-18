<?php

/* @CoreAdminHome/trackingCodeGenerator.twig */
class __TwigTemplate_2cc4248eadf5185f93aa3081d21653bebf20db8241aa254ef023ec18f7311b57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@CoreAdminHome/trackingCodeGenerator.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 8
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JavaScriptTracking")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"plugins/CoreAdminHome/stylesheets/jsTrackingGenerator.css\" />
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
    <input type=\"hidden\" name=\"numMaxCustomVariables\"
           value=\"";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, ($context["maxCustomVariables"] ?? $this->getContext($context, "maxCustomVariables")), "html_attr");
        echo "\">

<div piwik-content-block
     content-title=\"";
        // line 16
        echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html_attr");
        echo "\"
     help-url=\"http://piwik.org/docs/tracking-api/\"
     rate=\"";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_TrackingCode")), "html_attr");
        echo "\">

    <div id=\"js-code-options\" ng-controller=\"JsTrackingCodeController as jsTrackingCode\">

        <p>
            ";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro1")), "html", null, true);
        echo "
            <br/><br/>
            ";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro2")), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3b", "<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\"  target=\"_blank\">", "</a>"));
        echo "
            <br/><br/>
            ";
        // line 27
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro4", "<a href=\"#image-tracking-link\">", "</a>"));
        echo "
            <br/><br/>
            ";
        // line 29
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a rel=\"noreferrer\"  target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "
        </p>

        <div piwik-field uicontrol=\"site\" name=\"js-tracker-website\"
             class=\"jsTrackingCodeWebsite\"
             ng-model=\"jsTrackingCode.site\"
             ng-change=\"jsTrackingCode.changeSite(true)\"
             introduction=\"";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html_attr");
        echo "\"
             value='";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["defaultSite"] ?? $this->getContext($context, "defaultSite"))), "html", null, true);
        echo "'>
        </div>

        <div id=\"optional-js-tracking-options\">

            ";
        // line 43
        echo "            <div id=\"jsTrackAllSubdomainsInlineHelp\" class=\"inline-help-node\">
                ";
        // line 44
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeSubdomainsDesc", "x.<span class='current-site-host'></span>", "y.<span class='current-site-host'></span>"));
        echo "
                ";
        // line 45
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LearnMore", " (<a href=\"http://developer.piwik.org/guides/tracking-javascript-guide#measuring-domains-andor-sub-domains\" rel=\"noreferrer\"  target=\"_blank\">", "</a>)"));
        echo "
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-all-subdomains\"
                 ng-model=\"jsTrackingCode.trackAllSubdomains\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 introduction=\"";
        // line 52
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Options")), "html_attr");
        echo "\"
                 title=\"";
        // line 53
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeSubdomains")), "html_attr");
        echo " <span class='current-site-name'></span>\"
                 value=\"\" inline-help=\"#jsTrackAllSubdomainsInlineHelp\">
            </div>

            ";
        // line 58
        echo "            <div id=\"jsTrackGroupByDomainInlineHelp\" class=\"inline-help-node\">
                ";
        // line 59
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_GroupPageTitlesByDomainDesc1", "<span class='current-site-host'></span>"));
        echo "
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-group-by-domain\"
                 ng-model=\"jsTrackingCode.groupByDomain\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"";
        // line 66
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_GroupPageTitlesByDomain")), "html_attr");
        echo "\"
                 value=\"\" inline-help=\"#jsTrackGroupByDomainInlineHelp\">
            </div>

            ";
        // line 71
        echo "            <div id=\"jsTrackAllAliasesInlineHelp\" class=\"inline-help-node\">
                ";
        // line 72
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeAliasesDesc", "<span class='current-site-alias'></span>"));
        echo "
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-all-aliases\"
                 ng-model=\"jsTrackingCode.trackAllAliases\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"";
        // line 79
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_MergeAliases")), "html_attr");
        echo " <span class='current-site-name'></span>\"
                 value=\"\" inline-help=\"#jsTrackAllAliasesInlineHelp\">
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-noscript\"
                 ng-model=\"jsTrackingCode.trackNoScript\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"";
        // line 87
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_TrackNoScript")), "html_attr");
        echo "\"
                 value=\"\" inline-help=\"\">
            </div>

            <h3>";
        // line 91
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_Advanced")), "html", null, true);
        echo "</h3>

            <p>
                <a href=\"javascript:;\"
                   ng-show=\"!jsTrackingCode.showAdvanced\"
                   ng-click=\"jsTrackingCode.showAdvanced = true\">";
        // line 96
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Show")), "html", null, true);
        echo "</a>
                <a href=\"javascript:;\"
                   ng-show=\"jsTrackingCode.showAdvanced\"
                   ng-click=\"jsTrackingCode.showAdvanced = false\">";
        // line 99
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Hide")), "html", null, true);
        echo "</a>
            </p>

            <div id=\"javascript-advanced-options\" ng-show=\"jsTrackingCode.showAdvanced\">

                ";
        // line 105
        echo "                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-visitor-cv-check\"
                     ng-model=\"jsTrackingCode.trackCustomVars\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     disabled=\"jsTrackingCode.isLoading\"
                     title=\"";
        // line 109
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_VisitorCustomVars")), "html_attr");
        echo "\"
                     value=\"\" inline-help=\"";
        // line 110
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_VisitorCustomVarsDesc")), "html_attr");
        echo "\">
                </div>

                <div id=\"javascript-tracking-visitor-cv\" ng-show=\"jsTrackingCode.trackCustomVars\">
                    <div class=\"row\">
                        <div class=\"col s12 m3\">
                            ";
        // line 116
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Name")), "html", null, true);
        echo "
                        </div>
                        <div class=\"col s12 m3\">
                            ";
        // line 119
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Value")), "html", null, true);
        echo "
                        </div>
                    </div>
                    <div class=\"row\" ng-repeat=\"customVar in jsTrackingCode.customVars\">
                        <div class=\"col s12 m6 l3\">
                            <input type=\"text\" class=\"custom-variable-name\"
                                   ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                   ng-model=\"jsTrackingCode.customVars[\$index.toString()].name\"
                                   placeholder=\"e.g. Type\"/>
                        </div>
                        <div class=\"col s12 m6 l3\">
                            <input type=\"text\" class=\"custom-variable-value\"
                                   ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                   ng-model=\"jsTrackingCode.customVars[\$index.toString()].value\"
                                   placeholder=\"e.g. Customer\"/>
                        </div>
                    </div>
                    <div class=\"row\" ng-show=\"jsTrackingCode.canAddMoreCustomVariables\">
                        <div class=\"col s12\">
                            <a href=\"javascript:;\"
                               ng-click=\"jsTrackingCode.addCustomVar()\"
                               class=\"add-custom-variable\"><span class=\"icon-add\"></span> ";
        // line 140
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Add")), "html", null, true);
        echo "</a>
                        </div>
                    </div>
                </div>

                ";
        // line 146
        echo "                <div id=\"jsCrossDomain\" class=\"inline-help-node\">
                    ";
        // line 147
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CrossDomain")), "html", null, true);
        echo "
                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-cross-domain\"
                     ng-model=\"jsTrackingCode.crossDomain\"
                     ng-change=\"jsTrackingCode.updateTrackingCode();jsTrackingCode.onCrossDomainToggle();\"
                     disabled=\"jsTrackingCode.isLoading || !jsTrackingCode.hasManySiteUrls\"
                     title=\"";
        // line 154
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableCrossDomainLinking")), "html_attr");
        echo "\"
                     value=\"\" inline-help=\"#jsCrossDomain\">
                </div>

                ";
        // line 159
        echo "                <div id=\"jsDoNotTrackInlineHelp\" class=\"inline-help-node\">
                    ";
        // line 160
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrackDesc")), "html", null, true);
        echo "
                    ";
        // line 161
        if (($context["serverSideDoNotTrackEnabled"] ?? $this->getContext($context, "serverSideDoNotTrackEnabled"))) {
            // line 162
            echo "                        <br/>
                        ";
            // line 163
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrack_AlreadyEnabled")), "html", null, true);
            echo "
                    ";
        }
        // line 165
        echo "                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-do-not-track\"
                     ng-model=\"jsTrackingCode.doNotTrack\"
                     ng-change=\"jsTrackingCode.updateTrackingCode() \"
                     disabled=\"jsTrackingCode.isLoading\"
                     title=\"";
        // line 171
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_EnableDoNotTrack")), "html_attr");
        echo "\"
                     value=\"\" inline-help=\"#jsDoNotTrackInlineHelp\">
                </div>

                ";
        // line 176
        echo "                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-disable-cookies\"
                     ng-model=\"jsTrackingCode.disableCookies\"
                     disabled=\"jsTrackingCode.isLoading\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     title=\"";
        // line 180
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_DisableCookies")), "html_attr");
        echo "\"
                     value=\"\" inline-help=\"";
        // line 181
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_DisableCookiesDesc")), "html_attr");
        echo "\">
                </div>

                ";
        // line 185
        echo "                <div id=\"jsTrackCampaignParamsInlineHelp\" class=\"inline-help-node\">
                    ";
        // line 186
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CustomCampaignQueryParamDesc", "<a href=\"http://piwik.org/faq/general/#faq_119\" rel=\"noreferrer\"  target=\"_blank\">", "</a>"));
        echo "
                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"custom-campaign-query-params-check\"
                     ng-model=\"jsTrackingCode.useCustomCampaignParams\"
                     disabled=\"jsTrackingCode.isLoading\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     title=\"";
        // line 193
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CustomCampaignQueryParam")), "html_attr");
        echo "\"
                     value=\"\" inline-help=\"#jsTrackCampaignParamsInlineHelp\">
                </div>

                <div ng-show=\"jsTrackingCode.useCustomCampaignParams\" id=\"js-campaign-query-param-extra\">
                    <div class=\"row\">
                        <div class=\"col s12\">
                            <div piwik-field uicontrol=\"text\" name=\"custom-campaign-name-query-param\"
                                 ng-model=\"jsTrackingCode.customCampaignName\"
                                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                 disabled=\"jsTrackingCode.isLoading\"
                                 title=\"";
        // line 204
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CampaignNameParam")), "html_attr");
        echo "\"
                                 value=\"\">
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col s12\">
                            <div piwik-field uicontrol=\"text\" name=\"custom-campaign-keyword-query-param\"
                                 ng-model=\"jsTrackingCode.customCampaignKeyword\"
                                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                 disabled=\"jsTrackingCode.isLoading\"
                                 title=\"";
        // line 215
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CampaignKwdParam")), "html_attr");
        echo "\"
                                 value=\"\">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div id=\"javascript-output-section\">
            <h3>";
        // line 227
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

            <p>";
        // line 229
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead", "&lt;/head&gt;"));
        echo "</p>

            <div id=\"javascript-text\">
                <pre piwik-select-on-focus class=\"codeblock\"
                     ng-bind=\"jsTrackingCode.trackingCode\"> </pre>
            </div>
        </div>
    </div>
</div>

<div piwik-content-block content-title=\"";
        // line 239
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTracking")), "html_attr");
        echo "\">
    <a name=\"image-tracking-link\"></a>

    <div id=\"image-tracking-code-options\" ng-controller=\"ImageTrackingCodeController as imageTrackingCode\">

        <p>
            ";
        // line 245
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro1")), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro2", "<code>&lt;noscript&gt;&lt;/noscript&gt;</code>"));
        echo "
        </p>
        <p>
            ";
        // line 248
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingIntro3", "<a href=\"http://piwik.org/docs/tracking-api/reference/\" rel=\"noreferrer\"  target=\"_blank\">", "</a>"));
        echo "
        </p>

        ";
        // line 252
        echo "        <div piwik-field uicontrol=\"site\" name=\"image-tracker-website\"
             ng-model=\"imageTrackingCode.site\"
             ng-change=\"imageTrackingCode.changeSite(true)\"
             introduction=\"";
        // line 255
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html_attr");
        echo "\"
             value='";
        // line 256
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["defaultSite"] ?? $this->getContext($context, "defaultSite"))), "html", null, true);
        echo "'>
        </div>

        ";
        // line 260
        echo "        <div piwik-field uicontrol=\"text\" name=\"image-tracker-action-name\"
             ng-model=\"imageTrackingCode.pageName\"
             ng-change=\"imageTrackingCode.updateTrackingCode()\"
             disabled=\"imageTrackingCode.isLoading\"
             introduction=\"";
        // line 264
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Options")), "html_attr");
        echo "\"
             title=\"";
        // line 265
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_ColumnPageName")), "html_attr");
        echo "\"
             value=\"\">
        </div>

        ";
        // line 270
        echo "        <div piwik-field uicontrol=\"checkbox\" name=\"image-tracking-goal-check\"
             ng-model=\"imageTrackingCode.trackGoal\"
             ng-change=\"imageTrackingCode.updateTrackingCode()\"
             disabled=\"imageTrackingCode.isLoading\"
             title=\"";
        // line 274
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_TrackAGoal")), "html_attr");
        echo "\"
             value=\"\">
        </div>

        <div ng-show=\"imageTrackingCode.trackGoal\"
             id=\"image-tracking-goal-sub\">
            <div class=\"row\">
                <div class=\"col s12 m6\">
                    <div piwik-field uicontrol=\"select\" name=\"image-tracker-goal\"
                         options=\"imageTrackingCode.allGoals\"
                         disabled=\"imageTrackingCode.isLoading\"
                         ng-model=\"imageTrackingCode.trackIdGoal\"
                         full-width=\"true\"
                         ng-change=\"imageTrackingCode.updateTrackingCode()\"
                         value=\"\">
                    </div>
                </div>
                <div class=\"col s12 m6\">
                    <div piwik-field uicontrol=\"text\" name=\"image-revenue\"
                         ng-model=\"imageTrackingCode.revenue\"
                         ng-change=\"imageTrackingCode.updateTrackingCode()\"
                         disabled=\"imageTrackingCode.isLoading\"
                         full-width=\"true\"
                         title=\"";
        // line 297
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_WithOptionalRevenue")), "html_attr");
        echo " <span class='site-currency'></span>\"
                         value=\"\">
                    </div>
                </div>
            </div>
        </div>

        <div id=\"image-link-output-section\">
            <h3>";
        // line 305
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImageTrackingLink")), "html", null, true);
        echo "</h3>

            <div id=\"image-tracking-text\">
                <pre piwik-select-on-focus
                          ng-bind=\"imageTrackingCode.trackingCode\"> </pre>
            </div>
        </div>
    </div>
</div>

<div piwik-content-block content-title=\"";
        // line 315
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImportingServerLogs")), "html_attr");
        echo "\">
    <p>
        ";
        // line 317
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_ImportingServerLogsDesc", "<a href=\"http://piwik.org/log-analytics/\" rel=\"noreferrer\"  target=\"_blank\">", "</a>"));
        echo "
    </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/trackingCodeGenerator.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  526 => 317,  521 => 315,  508 => 305,  497 => 297,  471 => 274,  465 => 270,  458 => 265,  454 => 264,  448 => 260,  442 => 256,  438 => 255,  433 => 252,  427 => 248,  419 => 245,  410 => 239,  397 => 229,  392 => 227,  377 => 215,  363 => 204,  349 => 193,  339 => 186,  336 => 185,  330 => 181,  326 => 180,  320 => 176,  313 => 171,  305 => 165,  300 => 163,  297 => 162,  295 => 161,  291 => 160,  288 => 159,  281 => 154,  271 => 147,  268 => 146,  260 => 140,  236 => 119,  230 => 116,  221 => 110,  217 => 109,  211 => 105,  203 => 99,  197 => 96,  189 => 91,  182 => 87,  171 => 79,  161 => 72,  158 => 71,  151 => 66,  141 => 59,  138 => 58,  131 => 53,  127 => 52,  117 => 45,  113 => 44,  110 => 43,  102 => 37,  98 => 36,  88 => 29,  83 => 27,  76 => 25,  71 => 23,  63 => 18,  58 => 16,  52 => 13,  48 => 11,  45 => 10,  37 => 4,  34 => 3,  30 => 1,  26 => 8,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin.twig' %}

{% block head %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"plugins/CoreAdminHome/stylesheets/jsTrackingGenerator.css\" />
{% endblock %}

{% set title %}{{ 'CoreAdminHome_JavaScriptTracking'|translate }}{% endset %}

{% block content %}

    <input type=\"hidden\" name=\"numMaxCustomVariables\"
           value=\"{{ maxCustomVariables|e('html_attr') }}\">

<div piwik-content-block
     content-title=\"{{ title|e('html_attr') }}\"
     help-url=\"http://piwik.org/docs/tracking-api/\"
     rate=\"{{ 'CoreAdminHome_TrackingCode'|translate|e('html_attr') }}\">

    <div id=\"js-code-options\" ng-controller=\"JsTrackingCodeController as jsTrackingCode\">

        <p>
            {{ 'CoreAdminHome_JSTrackingIntro1'|translate }}
            <br/><br/>
            {{ 'CoreAdminHome_JSTrackingIntro2'|translate }} {{ 'CoreAdminHome_JSTrackingIntro3b'|translate('<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\"  target=\"_blank\">','</a>')|raw }}
            <br/><br/>
            {{ 'CoreAdminHome_JSTrackingIntro4'|translate('<a href=\"#image-tracking-link\">','</a>')|raw }}
            <br/><br/>
            {{ 'CoreAdminHome_JSTrackingIntro5'|translate('<a rel=\"noreferrer\"  target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">','</a>')|raw }}
        </p>

        <div piwik-field uicontrol=\"site\" name=\"js-tracker-website\"
             class=\"jsTrackingCodeWebsite\"
             ng-model=\"jsTrackingCode.site\"
             ng-change=\"jsTrackingCode.changeSite(true)\"
             introduction=\"{{ 'General_Website'|translate|e('html_attr') }}\"
             value='{{ defaultSite|json_encode }}'>
        </div>

        <div id=\"optional-js-tracking-options\">

            {# track across all subdomains #}
            <div id=\"jsTrackAllSubdomainsInlineHelp\" class=\"inline-help-node\">
                {{ 'CoreAdminHome_JSTracking_MergeSubdomainsDesc'|translate(\"x.<span class='current-site-host'></span>\",\"y.<span class='current-site-host'></span>\")|raw }}
                {{ 'General_LearnMore'|translate(' (<a href=\"http://developer.piwik.org/guides/tracking-javascript-guide#measuring-domains-andor-sub-domains\" rel=\"noreferrer\"  target=\"_blank\">', '</a>)')|raw }}
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-all-subdomains\"
                 ng-model=\"jsTrackingCode.trackAllSubdomains\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 introduction=\"{{ 'General_Options'|translate|e('html_attr') }}\"
                 title=\"{{ 'CoreAdminHome_JSTracking_MergeSubdomains'|translate|e('html_attr') }} <span class='current-site-name'></span>\"
                 value=\"\" inline-help=\"#jsTrackAllSubdomainsInlineHelp\">
            </div>

            {# group page titles by site domain #}
            <div id=\"jsTrackGroupByDomainInlineHelp\" class=\"inline-help-node\">
                {{ 'CoreAdminHome_JSTracking_GroupPageTitlesByDomainDesc1'|translate(\"<span class='current-site-host'></span>\")|raw }}
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-group-by-domain\"
                 ng-model=\"jsTrackingCode.groupByDomain\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"{{ 'CoreAdminHome_JSTracking_GroupPageTitlesByDomain'|translate|e('html_attr') }}\"
                 value=\"\" inline-help=\"#jsTrackGroupByDomainInlineHelp\">
            </div>

            {# track across all site aliases #}
            <div id=\"jsTrackAllAliasesInlineHelp\" class=\"inline-help-node\">
                {{ 'CoreAdminHome_JSTracking_MergeAliasesDesc'|translate(\"<span class='current-site-alias'></span>\")|raw }}
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-all-aliases\"
                 ng-model=\"jsTrackingCode.trackAllAliases\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"{{ 'CoreAdminHome_JSTracking_MergeAliases'|translate|e('html_attr') }} <span class='current-site-name'></span>\"
                 value=\"\" inline-help=\"#jsTrackAllAliasesInlineHelp\">
            </div>

            <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-noscript\"
                 ng-model=\"jsTrackingCode.trackNoScript\"
                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                 disabled=\"jsTrackingCode.isLoading\"
                 title=\"{{ 'CoreAdminHome_JSTracking_TrackNoScript'|translate|e('html_attr') }}\"
                 value=\"\" inline-help=\"\">
            </div>

            <h3>{{ 'Mobile_Advanced'|translate }}</h3>

            <p>
                <a href=\"javascript:;\"
                   ng-show=\"!jsTrackingCode.showAdvanced\"
                   ng-click=\"jsTrackingCode.showAdvanced = true\">{{ 'General_Show'|translate }}</a>
                <a href=\"javascript:;\"
                   ng-show=\"jsTrackingCode.showAdvanced\"
                   ng-click=\"jsTrackingCode.showAdvanced = false\">{{ 'General_Hide'|translate }}</a>
            </p>

            <div id=\"javascript-advanced-options\" ng-show=\"jsTrackingCode.showAdvanced\">

                {# visitor custom variable #}
                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-visitor-cv-check\"
                     ng-model=\"jsTrackingCode.trackCustomVars\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     disabled=\"jsTrackingCode.isLoading\"
                     title=\"{{ 'CoreAdminHome_JSTracking_VisitorCustomVars'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"{{ 'CoreAdminHome_JSTracking_VisitorCustomVarsDesc'|translate|e('html_attr') }}\">
                </div>

                <div id=\"javascript-tracking-visitor-cv\" ng-show=\"jsTrackingCode.trackCustomVars\">
                    <div class=\"row\">
                        <div class=\"col s12 m3\">
                            {{ 'General_Name'|translate }}
                        </div>
                        <div class=\"col s12 m3\">
                            {{ 'General_Value'|translate }}
                        </div>
                    </div>
                    <div class=\"row\" ng-repeat=\"customVar in jsTrackingCode.customVars\">
                        <div class=\"col s12 m6 l3\">
                            <input type=\"text\" class=\"custom-variable-name\"
                                   ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                   ng-model=\"jsTrackingCode.customVars[\$index.toString()].name\"
                                   placeholder=\"e.g. Type\"/>
                        </div>
                        <div class=\"col s12 m6 l3\">
                            <input type=\"text\" class=\"custom-variable-value\"
                                   ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                   ng-model=\"jsTrackingCode.customVars[\$index.toString()].value\"
                                   placeholder=\"e.g. Customer\"/>
                        </div>
                    </div>
                    <div class=\"row\" ng-show=\"jsTrackingCode.canAddMoreCustomVariables\">
                        <div class=\"col s12\">
                            <a href=\"javascript:;\"
                               ng-click=\"jsTrackingCode.addCustomVar()\"
                               class=\"add-custom-variable\"><span class=\"icon-add\"></span> {{ 'General_Add'|translate }}</a>
                        </div>
                    </div>
                </div>

                {# cross domain support #}
                <div id=\"jsCrossDomain\" class=\"inline-help-node\">
                    {{ \"CoreAdminHome_JSTracking_CrossDomain\"|translate }}
                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-cross-domain\"
                     ng-model=\"jsTrackingCode.crossDomain\"
                     ng-change=\"jsTrackingCode.updateTrackingCode();jsTrackingCode.onCrossDomainToggle();\"
                     disabled=\"jsTrackingCode.isLoading || !jsTrackingCode.hasManySiteUrls\"
                     title=\"{{ 'CoreAdminHome_JSTracking_EnableCrossDomainLinking'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"#jsCrossDomain\">
                </div>

                {# do not track support #}
                <div id=\"jsDoNotTrackInlineHelp\" class=\"inline-help-node\">
                    {{ 'CoreAdminHome_JSTracking_EnableDoNotTrackDesc'|translate }}
                    {% if serverSideDoNotTrackEnabled %}
                        <br/>
                        {{ 'CoreAdminHome_JSTracking_EnableDoNotTrack_AlreadyEnabled'|translate }}
                    {% endif %}
                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-do-not-track\"
                     ng-model=\"jsTrackingCode.doNotTrack\"
                     ng-change=\"jsTrackingCode.updateTrackingCode() \"
                     disabled=\"jsTrackingCode.isLoading\"
                     title=\"{{ 'CoreAdminHome_JSTracking_EnableDoNotTrack'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"#jsDoNotTrackInlineHelp\">
                </div>

                {# disable all cookies options #}
                <div piwik-field uicontrol=\"checkbox\" name=\"javascript-tracking-disable-cookies\"
                     ng-model=\"jsTrackingCode.disableCookies\"
                     disabled=\"jsTrackingCode.isLoading\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     title=\"{{ 'CoreAdminHome_JSTracking_DisableCookies'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"{{ 'CoreAdminHome_JSTracking_DisableCookiesDesc'|translate|e('html_attr') }}\">
                </div>

                {# custom campaign name/keyword query params #}
                <div id=\"jsTrackCampaignParamsInlineHelp\" class=\"inline-help-node\">
                    {{ 'CoreAdminHome_JSTracking_CustomCampaignQueryParamDesc'|translate('<a href=\"http://piwik.org/faq/general/#faq_119\" rel=\"noreferrer\"  target=\"_blank\">','</a>')|raw }}
                </div>

                <div piwik-field uicontrol=\"checkbox\" name=\"custom-campaign-query-params-check\"
                     ng-model=\"jsTrackingCode.useCustomCampaignParams\"
                     disabled=\"jsTrackingCode.isLoading\"
                     ng-change=\"jsTrackingCode.updateTrackingCode()\"
                     title=\"{{ 'CoreAdminHome_JSTracking_CustomCampaignQueryParam'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"#jsTrackCampaignParamsInlineHelp\">
                </div>

                <div ng-show=\"jsTrackingCode.useCustomCampaignParams\" id=\"js-campaign-query-param-extra\">
                    <div class=\"row\">
                        <div class=\"col s12\">
                            <div piwik-field uicontrol=\"text\" name=\"custom-campaign-name-query-param\"
                                 ng-model=\"jsTrackingCode.customCampaignName\"
                                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                 disabled=\"jsTrackingCode.isLoading\"
                                 title=\"{{ 'CoreAdminHome_JSTracking_CampaignNameParam'|translate|e('html_attr') }}\"
                                 value=\"\">
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col s12\">
                            <div piwik-field uicontrol=\"text\" name=\"custom-campaign-keyword-query-param\"
                                 ng-model=\"jsTrackingCode.customCampaignKeyword\"
                                 ng-change=\"jsTrackingCode.updateTrackingCode()\"
                                 disabled=\"jsTrackingCode.isLoading\"
                                 title=\"{{ 'CoreAdminHome_JSTracking_CampaignKwdParam'|translate|e('html_attr') }}\"
                                 value=\"\">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div id=\"javascript-output-section\">
            <h3>{{ 'General_JsTrackingTag'|translate }}</h3>

            <p>{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead'|translate(\"&lt;/head&gt;\")|raw }}</p>

            <div id=\"javascript-text\">
                <pre piwik-select-on-focus class=\"codeblock\"
                     ng-bind=\"jsTrackingCode.trackingCode\"> </pre>
            </div>
        </div>
    </div>
</div>

<div piwik-content-block content-title=\"{{ 'CoreAdminHome_ImageTracking'|translate|e('html_attr') }}\">
    <a name=\"image-tracking-link\"></a>

    <div id=\"image-tracking-code-options\" ng-controller=\"ImageTrackingCodeController as imageTrackingCode\">

        <p>
            {{ 'CoreAdminHome_ImageTrackingIntro1'|translate }} {{ 'CoreAdminHome_ImageTrackingIntro2'|translate(\"<code>&lt;noscript&gt;&lt;/noscript&gt;</code>\")|raw }}
        </p>
        <p>
            {{ 'CoreAdminHome_ImageTrackingIntro3'|translate('<a href=\"http://piwik.org/docs/tracking-api/reference/\" rel=\"noreferrer\"  target=\"_blank\">','</a>')|raw }}
        </p>

        {# website #}
        <div piwik-field uicontrol=\"site\" name=\"image-tracker-website\"
             ng-model=\"imageTrackingCode.site\"
             ng-change=\"imageTrackingCode.changeSite(true)\"
             introduction=\"{{ 'General_Website'|translate|e('html_attr') }}\"
             value='{{ defaultSite|json_encode }}'>
        </div>

        {# action_name #}
        <div piwik-field uicontrol=\"text\" name=\"image-tracker-action-name\"
             ng-model=\"imageTrackingCode.pageName\"
             ng-change=\"imageTrackingCode.updateTrackingCode()\"
             disabled=\"imageTrackingCode.isLoading\"
             introduction=\"{{ 'General_Options'|translate|e('html_attr') }}\"
             title=\"{{ 'Actions_ColumnPageName'|translate|e('html_attr') }}\"
             value=\"\">
        </div>

        {# goal #}
        <div piwik-field uicontrol=\"checkbox\" name=\"image-tracking-goal-check\"
             ng-model=\"imageTrackingCode.trackGoal\"
             ng-change=\"imageTrackingCode.updateTrackingCode()\"
             disabled=\"imageTrackingCode.isLoading\"
             title=\"{{ 'CoreAdminHome_TrackAGoal'|translate|e('html_attr') }}\"
             value=\"\">
        </div>

        <div ng-show=\"imageTrackingCode.trackGoal\"
             id=\"image-tracking-goal-sub\">
            <div class=\"row\">
                <div class=\"col s12 m6\">
                    <div piwik-field uicontrol=\"select\" name=\"image-tracker-goal\"
                         options=\"imageTrackingCode.allGoals\"
                         disabled=\"imageTrackingCode.isLoading\"
                         ng-model=\"imageTrackingCode.trackIdGoal\"
                         full-width=\"true\"
                         ng-change=\"imageTrackingCode.updateTrackingCode()\"
                         value=\"\">
                    </div>
                </div>
                <div class=\"col s12 m6\">
                    <div piwik-field uicontrol=\"text\" name=\"image-revenue\"
                         ng-model=\"imageTrackingCode.revenue\"
                         ng-change=\"imageTrackingCode.updateTrackingCode()\"
                         disabled=\"imageTrackingCode.isLoading\"
                         full-width=\"true\"
                         title=\"{{ 'CoreAdminHome_WithOptionalRevenue'|translate|e('html_attr') }} <span class='site-currency'></span>\"
                         value=\"\">
                    </div>
                </div>
            </div>
        </div>

        <div id=\"image-link-output-section\">
            <h3>{{ 'CoreAdminHome_ImageTrackingLink'|translate }}</h3>

            <div id=\"image-tracking-text\">
                <pre piwik-select-on-focus
                          ng-bind=\"imageTrackingCode.trackingCode\"> </pre>
            </div>
        </div>
    </div>
</div>

<div piwik-content-block content-title=\"{{ 'CoreAdminHome_ImportingServerLogs'|translate|e('html_attr') }}\">
    <p>
        {{ 'CoreAdminHome_ImportingServerLogsDesc'|translate('<a href=\"http://piwik.org/log-analytics/\" rel=\"noreferrer\"  target=\"_blank\">','</a>')|raw }}
    </p>
</div>
{% endblock %}
", "@CoreAdminHome/trackingCodeGenerator.twig", "/var/www/html/analytics/plugins/CoreAdminHome/templates/trackingCodeGenerator.twig");
    }
}

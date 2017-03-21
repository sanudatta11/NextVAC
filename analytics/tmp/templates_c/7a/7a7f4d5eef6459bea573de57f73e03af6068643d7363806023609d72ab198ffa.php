<?php

/* @Transitions/renderPopover.twig */
class __TwigTemplate_0ad73a305a281b60a16aa3da0273508762f684df2c94bc74270467aee1c3836d extends Twig_Template
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
        echo "<div id=\"Transitions_Container\">
    <div id=\"Transitions_CenterBox\" class=\"Transitions_Text\">
        <h2></h2>

        <div class=\"Transitions_CenterBoxMetrics\">
            <p class=\"Transitions_Pageviews Transitions_Margin\">";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "pageviewsInline", array()))), "html", null, true);
        echo "</p>

            <div class=\"Transitions_IncomingTraffic\">
                <h3>";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Transitions_IncomingTraffic")), "html", null, true);
        echo "</h3>

                <p class=\"Transitions_PreviousPages\">";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "fromPreviousPagesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_PreviousSiteSearches\">";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "fromPreviousSiteSearchesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_SearchEngines\">";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "fromSearchEnginesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Websites\">";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "fromWebsitesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Campaigns\">";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "fromCampaignsInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_DirectEntries\">";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "directEntriesInline", array()))), "html", null, true);
        echo "</p>
            </div>

            <div class=\"Transitions_OutgoingTraffic\">
                <h3>";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Transitions_OutgoingTraffic")), "html", null, true);
        echo "</h3>

                <p class=\"Transitions_FollowingPages\">";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "toFollowingPagesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_FollowingSiteSearches\">";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "toFollowingSiteSearchesInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Downloads\">";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "downloadsInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Outlinks\">";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "outlinksInline", array()))), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Exits\">";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "exitsInline", array()))), "html", null, true);
        echo "</p>
            </div>
        </div>
    </div>
    <div id=\"Transitions_Loops\" class=\"Transitions_Text\">
        ";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute(($context["translations"] ?? $this->getContext($context, "translations")), "loopsInline", array()))), "html", null, true);
        echo "
    </div>
    <div id=\"Transitions_Canvas_Background_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Background_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Loops\" class=\"Transitions_Canvas_Container\"></div>
</div>

<script type=\"text/javascript\">
    var Piwik_Transitions_Translations = {
        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["translations"] ?? $this->getContext($context, "translations")));
        foreach ($context['_seq'] as $context["internalKey"] => $context["translation"]) {
            // line 52
            echo "            \"";
            echo \Piwik\piwik_escape_filter($this->env, $context["internalKey"], "html", null, true);
            echo "\": \"";
            echo \Piwik\piwik_escape_filter($this->env, $context["translation"], "html", null, true);
            echo "\",
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['internalKey'], $context['translation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        \"\": \"\"
    };
</script>";
    }

    public function getTemplateName()
    {
        return "@Transitions/renderPopover.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 54,  120 => 52,  116 => 51,  102 => 40,  94 => 35,  89 => 33,  84 => 31,  79 => 29,  74 => 27,  69 => 25,  62 => 21,  57 => 19,  52 => 17,  47 => 15,  42 => 13,  37 => 11,  32 => 9,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"Transitions_Container\">
    <div id=\"Transitions_CenterBox\" class=\"Transitions_Text\">
        <h2></h2>

        <div class=\"Transitions_CenterBoxMetrics\">
            <p class=\"Transitions_Pageviews Transitions_Margin\">{{ translations.pageviewsInline|translate }}</p>

            <div class=\"Transitions_IncomingTraffic\">
                <h3>{{ 'Transitions_IncomingTraffic'|translate }}</h3>

                <p class=\"Transitions_PreviousPages\">{{ translations.fromPreviousPagesInline|translate }}</p>

                <p class=\"Transitions_PreviousSiteSearches\">{{ translations.fromPreviousSiteSearchesInline|translate }}</p>

                <p class=\"Transitions_SearchEngines\">{{ translations.fromSearchEnginesInline|translate }}</p>

                <p class=\"Transitions_Websites\">{{ translations.fromWebsitesInline|translate }}</p>

                <p class=\"Transitions_Campaigns\">{{ translations.fromCampaignsInline|translate }}</p>

                <p class=\"Transitions_DirectEntries\">{{ translations.directEntriesInline|translate }}</p>
            </div>

            <div class=\"Transitions_OutgoingTraffic\">
                <h3>{{ 'Transitions_OutgoingTraffic'|translate }}</h3>

                <p class=\"Transitions_FollowingPages\">{{ translations.toFollowingPagesInline|translate }}</p>

                <p class=\"Transitions_FollowingSiteSearches\">{{ translations.toFollowingSiteSearchesInline|translate }}</p>

                <p class=\"Transitions_Downloads\">{{ translations.downloadsInline|translate }}</p>

                <p class=\"Transitions_Outlinks\">{{ translations.outlinksInline|translate }}</p>

                <p class=\"Transitions_Exits\">{{ translations.exitsInline|translate }}</p>
            </div>
        </div>
    </div>
    <div id=\"Transitions_Loops\" class=\"Transitions_Text\">
        {{ translations.loopsInline|translate }}
    </div>
    <div id=\"Transitions_Canvas_Background_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Background_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Loops\" class=\"Transitions_Canvas_Container\"></div>
</div>

<script type=\"text/javascript\">
    var Piwik_Transitions_Translations = {
        {% for internalKey, translation in translations %}
            \"{{ internalKey }}\": \"{{ translation }}\",
        {% endfor %}
        \"\": \"\"
    };
</script>", "@Transitions/renderPopover.twig", "/var/www/html/analytics/plugins/Transitions/templates/renderPopover.twig");
    }
}

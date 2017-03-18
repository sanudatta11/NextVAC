<?php

/* @Live/getVisitList.twig */
class __TwigTemplate_851d2181a24d02212561fb2727874adfa8fbb33eaa604a1522129c5e941fd4bd extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visits"] ?? $this->getContext($context, "visits")), "getRows", array(), "method"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["visitInfo"]) {
            // line 2
            echo "<li>
    <div>
        <div class=\"visitor-profile-visit-title-row\">
            <h2 class=\"visitor-profile-visit-title\" data-idvisit=\"";
            // line 5
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "idVisit"), "method"), "html", null, true);
            echo "\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ClickToViewMoreAboutVisit")), "html", null, true);
            echo "\">
                ";
            // line 6
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visit")), "html", null, true);
            echo " #";
            echo \Piwik\piwik_escape_filter($this->env, ($context["startCounter"] ?? $this->getContext($context, "startCounter")), "html", null, true);
            echo "

                ";
            // line 8
            if (($this->getAttribute($context["visitInfo"], "getColumn", array(0 => "visitDuration"), "method") != 0)) {
                // line 9
                echo "                    <span>&nbsp; (";
                echo $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "visitDurationPretty"), "method");
                echo ")</span>
                ";
            }
            // line 11
            echo "                <span class=\"visitor-profile-date\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "\">
                    ";
            // line 12
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "
                </span>
            </h2>
        </div>
        <ol class=\"visitor-profile-actions\">
            ";
            // line 17
            $this->loadTemplate("@Live/_actionsList.twig", "@Live/getVisitList.twig", 17)->display(array_merge($context, array("actionDetails" => $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "actionDetails"), "method"), "clientSideParameters" => array("idSite" =>             // line 19
($context["idSite"] ?? $this->getContext($context, "idSite")), "pageUrlNotDefined" => call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_ColumnPageURL"))))), "overrideLinkStyle" => false)));
            // line 23
            echo "        </ol>
    </div>
</li>
";
            // line 26
            $context["startCounter"] = (($context["startCounter"] ?? $this->getContext($context, "startCounter")) + 1);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitInfo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/getVisitList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 26,  82 => 23,  80 => 19,  79 => 17,  69 => 12,  62 => 11,  56 => 9,  54 => 8,  47 => 6,  41 => 5,  36 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for visitInfo in visits.getRows() %}
<li>
    <div>
        <div class=\"visitor-profile-visit-title-row\">
            <h2 class=\"visitor-profile-visit-title\" data-idvisit=\"{{ visitInfo.getColumn('idVisit') }}\" title=\"{{ 'Live_ClickToViewMoreAboutVisit'|translate }}\">
                {{ 'General_Visit'|translate }} #{{ startCounter }}

                {% if visitInfo.getColumn('visitDuration') != 0 %}
                    <span>&nbsp; ({{ visitInfo.getColumn('visitDurationPretty')|raw }})</span>
                {% endif %}
                <span class=\"visitor-profile-date\" title=\"{{ visitInfo.getColumn('serverDatePrettyFirstAction') }} {{ visitInfo.getColumn('serverTimePrettyFirstAction') }}\">
                    {{ visitInfo.getColumn('serverDatePrettyFirstAction') }} {{ visitInfo.getColumn('serverTimePrettyFirstAction') }}
                </span>
            </h2>
        </div>
        <ol class=\"visitor-profile-actions\">
            {% include \"@Live/_actionsList.twig\" with {'actionDetails': visitInfo.getColumn('actionDetails'),
                                                       'clientSideParameters': {
                                                            'idSite': idSite,
                                                            'pageUrlNotDefined': 'General_NotDefined'|translate('Actions_ColumnPageURL'|translate)
                                                        },
                                                        'overrideLinkStyle': false} %}
        </ol>
    </div>
</li>
{% set startCounter = startCounter + 1 %}
{% endfor %}
", "@Live/getVisitList.twig", "/var/www/html/analytics/plugins/Live/templates/getVisitList.twig");
    }
}

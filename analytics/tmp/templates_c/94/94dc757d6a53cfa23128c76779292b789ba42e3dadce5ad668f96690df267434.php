<?php

/* @Annotations/_annotationList.twig */
class __TwigTemplate_7fd992ac44fa294730517faff0ef490e714aeac6f952888b993fe4f57c84afec extends Twig_Template
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
        echo "<div class=\"annotations\">

    ";
        // line 3
        if (twig_test_empty(($context["annotations"] ?? $this->getContext($context, "annotations")))) {
            // line 4
            echo "        <div class=\"empty-annotation-list\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_NoAnnotations")), "html", null, true);
            echo "</div>
    ";
        }
        // line 6
        echo "
    <table>
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["annotations"] ?? $this->getContext($context, "annotations")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["annotation"]) {
            // line 9
            echo "            ";
            $this->loadTemplate("@Annotations/_annotation.twig", "@Annotations/_annotationList.twig", 9)->display($context);
            // line 10
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['annotation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "        <tr class=\"new-annotation-row\" style=\"display:none;\" data-date=\"";
        echo \Piwik\piwik_escape_filter($this->env, ($context["selectedDate"] ?? $this->getContext($context, "selectedDate")), "html", null, true);
        echo "\">
            <td class=\"annotation-meta\">
                <div class=\"annotation-star\">&nbsp;</div>
                <div class=\"annotation-period-edit\">
                    <a href=\"#\">";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, ($context["selectedDate"] ?? $this->getContext($context, "selectedDate")), "html", null, true);
        echo "</a>

                    <div class=\"datepicker\" style=\"display:none;\"/>
                </div>
            </td>
            <td class=\"annotation-value\">
                <div class=\"input-field\">
                    <input type=\"text\" value=\"\"
                           class=\"new-annotation-edit browser-default\"
                           placeholder=\"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_EnterAnnotationText")), "html", null, true);
        echo "\"/>
                </div><br/>
                <input type=\"button\" class=\"btn new-annotation-save\" value=\"";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Save")), "html", null, true);
        echo "\"/>
                <input type=\"button\" class=\"btn new-annotation-cancel\" value=\"";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
        echo "\"/>
            </td>
            <td class=\"annotation-user-cell\"><span class=\"annotation-user\">";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, ($context["userLogin"] ?? $this->getContext($context, "userLogin")), "html", null, true);
        echo "</span></td>
        </tr>
    </table>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Annotations/_annotationList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 29,  98 => 27,  94 => 26,  89 => 24,  77 => 15,  69 => 11,  55 => 10,  52 => 9,  35 => 8,  31 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"annotations\">

    {% if annotations is empty %}
        <div class=\"empty-annotation-list\">{{ 'Annotations_NoAnnotations'|translate }}</div>
    {% endif %}

    <table>
        {% for annotation in annotations %}
            {% include \"@Annotations/_annotation.twig\" %}
        {% endfor %}
        <tr class=\"new-annotation-row\" style=\"display:none;\" data-date=\"{{ selectedDate }}\">
            <td class=\"annotation-meta\">
                <div class=\"annotation-star\">&nbsp;</div>
                <div class=\"annotation-period-edit\">
                    <a href=\"#\">{{ selectedDate }}</a>

                    <div class=\"datepicker\" style=\"display:none;\"/>
                </div>
            </td>
            <td class=\"annotation-value\">
                <div class=\"input-field\">
                    <input type=\"text\" value=\"\"
                           class=\"new-annotation-edit browser-default\"
                           placeholder=\"{{ 'Annotations_EnterAnnotationText'|translate }}\"/>
                </div><br/>
                <input type=\"button\" class=\"btn new-annotation-save\" value=\"{{ 'General_Save'|translate }}\"/>
                <input type=\"button\" class=\"btn new-annotation-cancel\" value=\"{{ 'General_Cancel'|translate }}\"/>
            </td>
            <td class=\"annotation-user-cell\"><span class=\"annotation-user\">{{ userLogin }}</span></td>
        </tr>
    </table>

</div>
", "@Annotations/_annotationList.twig", "/var/www/html/analytics/plugins/Annotations/templates/_annotationList.twig");
    }
}

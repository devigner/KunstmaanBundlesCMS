<?php

namespace {{ namespace }}\Controller;

use {{ namespace }}\AdminList\{{ entity_class }}CategoryAdminListConfigurator;
use Kunstmaan\ArticleBundle\Controller\AbstractArticleCategoryAdminListController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
{% if isV4 %}

/**
 * @Route("/{_locale}/%kunstmaan_admin.admin_prefix%/{{ entity_class|lower}}-category", requirements={"_locale"="%requiredlocales%"})
 */
{% endif %}
class {{ entity_class }}CategoryAdminListController extends AbstractArticleCategoryAdminListController
{
    /**
     * The index action
     *
     * @Route("/", name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category")
     * @return array
     */
    public function indexAction(Request $request)
    {
        return parent::doIndexAction($this->getAdminListConfigurator($request), $request);
    }

    /**
     * The add action
     *
     * @Route("/add", name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_add", methods={"GET", "POST"})
     * @return array
     */
    public function addAction(Request $request)
    {
        return parent::doAddAction($this->getAdminListConfigurator($request), null, $request);
    }

    /**
     * The edit action
     *
     * @param int $id
     *
     * @Route("/{id}", requirements={"id" = "\d+"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_edit", methods={"GET", "POST"})
     *
     * @return Response
     */
    public function editAction(Request $request, $id)
    {
        return parent::doEditAction($this->getAdminListConfigurator($request), $id, $request);
    }

    /**
     * The edit action
     *
     * @param int $id
     *
     * @Route("/{id}", requirements={"id" = "\d+"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_view", methods={"GET"})
     *
     * @return Response
     */
    public function viewAction(Request $request, $id)
    {
        return parent::doViewAction($this->getAdminListConfigurator($request), $id, $request);
    }

    /**
     * The delete action
     *
     * @param int $id
     *
     * @Route("/{id}/delete", requirements={"id" = "\d+"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_delete", methods={"GET", "POST"})
     *
     * @return Response
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::doDeleteAction($this->getAdminListConfigurator($request), $id, $request);
    }

    /**
     * The export action
     *
     * @param string $_format
     *
     * @Route("/export.{_format}", requirements={"_format" = "csv|xlsx|ods"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_export", methods={"GET", "POST"})
     * @return array
     */
    public function exportAction(Request $request, $_format)
    {
        return parent::doExportAction($this->getAdminListConfigurator($request), $_format, $request);
    }

    /**
     * The move up action
     *
     * @param int $id
     *
     * @Route("/{id}/move-up", requirements={"id" = "\d+"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_move_up", methods={"GET"})
     *
     * @return Response
     */
    public function moveUpAction(Request $request, $id)
    {
        return parent::doMoveUpAction($this->getAdminListConfigurator($request), $id, $request);
    }

    /**
     * The move down action
     *
     * @param int $id
     *
     * @Route("/{id}/move-down", requirements={"id" = "\d+"}, name="{{ bundle.getName()|lower }}_admin_{{ entity_class|lower }}category_move_down", methods={"GET"})
     *
     * @return array
     */
    public function moveDownAction(Request $request, $id)
    {
        return parent::doMoveDownAction($this->getAdminListConfigurator($request), $id, $request);
    }

    /**
     * @return {{ entity_class }}CategoryAdminListConfigurator
     */
    public function createAdminListConfigurator()
    {
        return new {{ entity_class }}CategoryAdminListConfigurator($this->em, $this->aclHelper);
    }
}

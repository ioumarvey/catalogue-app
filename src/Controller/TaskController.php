<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Comment;
use App\Entity\GuestUser;
use App\Form\Type\TaskType;
use App\Form\Type\CommentType;
use App\Service\CommentService;
use App\Entity\User;
use App\Service\TaskServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class TaskController.
 */
#[Route('/task')]
class TaskController extends AbstractController
{
    /**
     * Constructor.
     *
     * @param TaskServiceInterface $taskService    Task service
     * @param TranslatorInterface  $translator     Translator
     * @param CommentService       $commentService Comment service
     */
    public function __construct(TaskServiceInterface $taskService, TranslatorInterface $translator, CommentService $commentService)
    {
        $this->taskService = $taskService;
        $this->translator = $translator;
        $this->commentService = $commentService;
    }

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route(
        name: 'task_index',
        methods: 'GET'
    )]
    public function index(Request $request): Response
    {
        $filters = $this->getFilters($request);
        $pagination = $this->taskService->getPaginatedList(
            $request->query->getInt('page', 1),
            $filters
        );

        return $this->render('task/index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Add favorite action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/add_favorite', name: 'task_add_favorite', methods: 'GET|POST')]
    public function createFavorite(Request $request, Task $task): Response
    {
        $form = $this->createForm(
            FormType::class,
            $task,
            [
                'action' => $this->generateUrl('task_add_favorite', ['id' => $task->getId()]),
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $task->addFavorited($user);
            $this->taskService->save($task);

            $this->addFlash(
                'success',
                $this->translator->trans('message.added_successfully')
            );

            return $this->redirectToRoute('task_favorited');
        }

        return $this->render(
            'favorite/add.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * Delete favorite action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/delete_favorite', name: 'task_delete_favorite', requirements: ['id' => '[1-9]\d*'], methods: 'GET|DELETE')]
    public function deleteFavorite(Request $request, Task $task): Response
    {
        $form = $this->createForm(
            FormType::class,
            $task,
            [
                'method' => 'DELETE',
                'action' => $this->generateUrl('task_delete_favorite', ['id' => $task->getId()]),
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $task->removeFavorited($user);
            $this->taskService->save($task);

            $this->addFlash(
                'success',
                $this->translator->trans('message.deleted_successfully')
            );

            return $this->redirectToRoute('task_favorited');
        }

        return $this->render(
            'favorite/delete.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * Show action.
     *
     * @param Task $task Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}', name: 'task_show', requirements: ['id' => '@PSR1,@PSR2,@PSR12'], methods: 'GET')]
    public function show(Task $task): Response
    {
        return $this->render('task/show.html.twig', ['task' => $task]);
    }

    /**
     * Show favorited action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route('/favorite', name: 'task_favorited', methods: 'GET')]
    public function favorited(Request $request): Response
    {
        $filters = $this->getFilters($request);
        /**
         * @var User $user
         */
       Here are the corrected spacing in the given file:

```php
<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Comment;
use App\Entity\GuestUser;
use App\Form\Type\TaskType;
use App\Form\Type\CommentType;
use App\Service\CommentService;
use App\Entity\User;
use App\Service\TaskServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class TaskController.
 */
#[Route('/task')]
class TaskController extends AbstractController
{
    /**
     * Constructor.
     *
     * @param TaskServiceInterface $taskService    Task service
     * @param TranslatorInterface  $translator     Translator
     * @param CommentService       $commentService Comment service
     */
    public function __construct(TaskServiceInterface $taskService, TranslatorInterface $translator, CommentService $commentService)
    {
        $this->taskService = $taskService;
        $this->translator = $translator;
        $this->commentService = $commentService;
    }

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route(
        name: 'task_index',
        methods: 'GET'
    )]
    public function index(Request $request): Response
    {
        $filters = $this->getFilters($request);
        $pagination = $this->taskService->getPaginatedList(
            $request->query->getInt('page', 1),
            $filters
        );

        return $this->render('task/index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Add favorite action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/add_favorite', name: 'task_add_favorite', methods: 'GET|POST')]
    public function createFavorite(Request $request, Task $task): Response
    {
        $form = $this->createForm(
            FormType::class,
            $task,
            [
                'action' => $this->generateUrl('task_add_favorite', ['id' => $task->getId()]),
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $task->addFavorited($user);
            $this->taskService->save($task);

            $this->addFlash(
                'success',
                $this->translator->trans('message.added_successfully')
            );

            return $this->redirectToRoute('task_favorited');
        }

        return $this->render(
            'favorite/add.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * Delete favorite action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/delete_favorite', name: 'task_delete_favorite', requirements: ['id' => '[1-9]\d*'], methods: 'GET|DELETE')]
    public function deleteFavorite(Request $request, Task $task): Response
    {
        $form = $this->createForm(
            FormType::class,
            $task,
            [
                'method' => 'DELETE',
                'action' => $this->generateUrl('task_delete_favorite', ['id' => $task->getId()]),
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $task->removeFavorited($user);
            $this->taskService->save($task);

            $this->addFlash(
                'success',
                $this->translator->trans('message.deleted_successfully')
            );

            return $this->redirectToRoute('task_favorited');
        }

        return $this->render(
            'favorite/delete.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * Show action.
     *
     * @param Task $task Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}', name: 'task_show', requirements: ['id' => '@PSR1,@PSR2,@PSR12'], methods: 'GET')]
    public function show(Task $task): Response
    {
        return $this->render('task/show.html.twig', ['task' => $task]);
    }

    /**
     * Show favorited action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route('/favorite', name: 'task_favorited', methods: 'GET')]
    public function favorited(Request $request): Response
    {
        $filters = $this->getFilters($request);
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $pagination = $this->taskService->getPaginatedListFav(
            $request->query->getInt('page', 1),
            $user,
            $filters
        );

        return $this->render('favorite/index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Create action.
     *
     * @param Request $request HTTP request
     *
     * @return Response HTTP response
     */
    #[Route(
       '/create',
        name: 'task_create',
        methods: 'GET|POST',
    )]
    #[IsGranted('ROLE_ADMIN')]
    public function create(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $task = new Task();
        $task->setUsers($user);
        $form = $this->createForm(
            TaskType::class,
            $task,
            ['action' => $this->generateUrl('task_create')]
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->getUser()) {
                $email = $this->requestStack->getSession()->get('email');
                $guestUser = new GuestUser();
                $guestUser->setEmail($email);
                $this->guestUserService->save($guestUser);
            }

            $this->taskService->save($task);

            $this->addFlash('success', $this->translator->trans('message.task_created_successfully'));

            return $this->redirectToRoute('task_index');
        }

        return $this->render(
            'task/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * Edit action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/edit', name: 'task_edit', requirements: ['id' => '[1-9]\d*'], methods: 'GET|PUT')]
    #[IsGranted('EDIT', subject: 'task')]
    public function edit(Request $request, Task $task): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(
            TaskType::class,
            $task,
            [
                'method' => 'PUT',
                'action' => $this->generateUrl(
                    'task_edit',
                    ['id' => $task->getId()]
                ),
            ]
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->taskService->save($task);
            $this->addFlash('success', $this->translator->trans('message.updated_successfully'));

            return $this->redirectToRoute('task_index');
        }

        return $this->render(
            'task/edit.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * Delete action.
     *
     * @param Request $request HTTP request
     * @param Task    $task    Task entity
     *
     * @return Response HTTP response
     */
    #[Route('/{id}/delete', name: 'task_delete', requirements: ['id' => '[1-9]\d*'], methods: 'GET|DELETE')]
    #[IsGranted('DELETE', subject: 'task')]
    public function delete(Request $request, Task $task): Response
    {
        $form = $this->createForm(
            FormType::class,
            $task,
            [
                'method' => 'DELETE',
                'action' => $this->generateUrl(
                    'task_delete',
                    ['id' => $task->getId()]
                ),
            ]
        );
        $form->handleRequest($request);
        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
            $form->submit($request->request->get($form->getName()));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $this->taskService->delete($task);
            $this->addFlash('success', $this->translator->trans('message.deleted_successfully'));

            return $this->redirectToRoute('task_index');
        }

        return $this->render(
            'task/delete.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    /**
     * View action.
     *
     * @param Request $request HTTP request
     * @param int     $id      Task ID
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'view_task',
        requirements: ['id' => '[0-9]\d*'],
        methods: ['GET', 'POST']
    )]
    public function view(Request $request, int $id): Response
    {
        $task = $this->taskService->getTaskById($id);
        $pagination = $this->commentService->getPaginatedList($request->query->getInt('page', 1));

        $comment = new Comment();
        $comment->setTask($task);
        $comment->setUser($this->getUser());
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commentService->save($comment);

            return $this->redirectToRoute('view_task', ['id' => $id]);
        }

        return $this->render('task/show.html.twig', [
            'task' => $task,
            'pagination' => $pagination,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Get filters from request.
     *
     * @param Request $request HTTP request
     *
     * @return array<string, int> Array of filters
     */
    private function getFilters(Request $request): array
    {
        $filters = [];
        $filters['category_id'] = $request->query->getInt('filters_category_id');
        $filters['tag_id'] = $request->query->getInt('filters_tag_id');

        return $filters;
    }

    /**
     * Task service.
     */
    private TaskServiceInterface $taskService;

    /**
     * Translator.
     */
    private TranslatorInterface $translator;

    /**
     * Comment service.
     */
    private CommentService $commentService;
}

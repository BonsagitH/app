<?php 
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\App;

use App\Controller\Traits\ResponseTrait;
use Cake\Event\Event;
use Cake\Event\EventInterface;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class UsersController extends AppController
{
     use ResponseTrait;

     /**
     * init
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();

    }


     public function signup(){
     

        $user  = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $saved = $this->Users->save($user);
        if($saved){
          
            return $this->setJsonResponse([
                'success' => true,
                'data' => $user,
                'message' => __('user successfully added'),
            ], 201);

        }else{
            return $this->setJsonResponse([
                'errors' => $user->getErrors(),
                'message' => 'not saved'
            ], 422);
        }
    }


}
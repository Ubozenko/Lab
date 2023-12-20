<?php
    class UserController extends Controller {
        public function index() {
            $userModel = new User($this->pdo, 'users');
            $users = $userModel->all();
            $this->renderUsers($users);
        }

        public function show($id) {
            $userModel = new User($this->pdo, 'users');
            $user = $userModel->find($id);
            $this->renderUser($user);
        }            

        protected function renderUsers($users) {
            echo "<h1>User List</h1>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";

            foreach ($users as $user) {
                echo "<tr>";
                if ($user !== null) {
                    echo "<td>" . $user['id'] . "</td>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                } else {
                    echo "<td colspan='3'>User not found</td>";
                }
                echo "</tr>";
            }            

            echo "</table>";
        }

        protected function renderUser($user) {
            if ($user !== null) {
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
            } else {
                echo "User not found";
            }            
        }
    }
?>
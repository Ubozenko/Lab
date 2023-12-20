<?php
class MaterialController extends Controller {
    public function index() {
        $materialsModel = new Material($this->pdo, 'materials');
        $materials = $materialsModel->all();
        $this->renderMaterials($materials);
    }

    public function show($id) {
        $materialsModel = new Material($this->pdo, 'materials');
        $material = $materialsModel->find($id);
        $this->renderMaterial($material);
    }

    protected function renderMaterials($materials) {
        echo "<h1>Material List</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Product</th><th>Amount</th></tr>";

        foreach ($materials as $material) {
            echo "<tr>";
            echo "<td>" . $material['id'] . "</td>";
            echo "<td>" . $material['product'] . "</td>";
            echo "<td>" . $material['amount'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    protected function renderMaterial($material) {
        echo "<h1>Material Details</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Product</th><th>Amount</th></tr>";

        if ($material !== null) {
            echo "<tr>";
            echo "<td>" . $material['id'] . "</td>";
            echo "<td>" . $material['product'] . "</td>";
            echo "<td>" . $material['amount'] . "</td>";
            echo "</tr>";
        } else {
            echo "<tr><td colspan='3'>Material not found</td></tr>";
        }

        echo "</table>";
    }
}
?>

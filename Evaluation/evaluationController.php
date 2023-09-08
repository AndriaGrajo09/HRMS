<?php
class EvaluationController {
    private $evaluationModel;

    public function __construct($evaluationModel) {
        $this->evaluationModel = $evaluationModel;
    }

    public function index() {
        // Retrieve a list of scheduled evaluations
        $scheduledEvaluations = $this->evaluationModel->getScheduledEvaluations();
        include 'views/evaluation/list.php';
    }

    public function schedule() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to schedule an evaluation
            $employeeId = $_POST['employee_id'];
            $evaluationDate = $_POST['evaluation_date'];

            $this->evaluationModel->scheduleEvaluation($employeeId, $evaluationDate);
            header('Location: index.php?controller=EvaluationController&action=index');
        } else {
            // Display the form to schedule an evaluation
            $employees = $this->evaluationModel->getAllEmployees();
            include 'views/evaluation/schedule.php';
        }
    }

    public function conduct($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to conduct an evaluation
            $evaluationId = $id;
            $results = $_POST['results'];

            $this->evaluationModel->conductEvaluation($evaluationId, $results);
            header('Location: index.php?controller=EvaluationController&action=index');
        } else {
            // Display the form to conduct an evaluation
            $evaluation = $this->evaluationModel->getEvaluationById($id);
            include 'views/evaluation/conduct.php';
        }
    }

    public function generateReport($id) {
        // Generate an evaluation report for a specific evaluation
        $evaluation = $this->evaluationModel->getEvaluationById($id);

        // Implement logic to generate the report (e.g., using PDF generation library)
        // You can create a PDF, HTML, or any other format for the report
 // For example, you can pass $evaluation data to a PDF generation function
        // $pdfContent = generatePdf($evaluation);

        // Display or download the generated report
        // Implement logic to display or download the report as needed
    }
}
?>
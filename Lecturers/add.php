<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lecturer $lecturer
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">

            <div class="form-header-card">
                <div>
                    <h4 class="context-label">Lecturer Management</h4>
                    <h3 class="page-title"><?= __('Add New Lecturer') ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card">
                <?= $this->Form->create($lecturer) ?>
                <fieldset class="clean-fieldset">
                    <div class="form-group">
                        <?= $this->Form->control('name', [
                            'label' => 'Full Name',
                            'placeholder' => 'e.g. Dr. Ahmad Naqiu',
                        ]) ?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->control('email', [
                            'label' => 'Institutional Email',
                            'placeholder' => 'name@university.edu.my',
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('faculty', [
                            'label' => 'Faculty / Department',
                            'placeholder' => 'e.g. Faculty of Information Management',
                        ]) ?>
                    </div>
                </fieldset>
                
                <div class="form-action-footer">
                    <?= $this->Form->button(__('Register Lecturer'), ['class' => 'submit-btn']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>

        </div>
    </main>
</div>

<style>
    :root {
        --lecturer-tan: #C47955;
        --bg-light: #fdf2f4;
        --text-main: #1d1d1f;
        --text-muted: #86868b;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.4);
    }

    /* Layout Alignment */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
    }

    .main-wrapper {
        margin-left: 320px; /* Aligned with sidebar width + gap */
        padding: 40px;
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .form-wrapper {
        width: 100%;
        max-width: 800px;
    }

    /* Header & Form Cards */
    .form-header-card, .main-form-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(196, 121, 85, 0.05);
    }

    .form-header-card {
        padding: 30px 35px;
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .main-form-card {
        padding: 40px;
    }

    /* Typography */
    .context-label {
        color: var(--text-muted);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        margin: 0 0 5px 0;
    }

    .page-title {
        margin: 0;
        font-size: 24px;
        font-weight: 800;
        color: var(--text-main);
    }

    /* Form Elements */
    .clean-fieldset { border: none; padding: 0; margin: 0; }
    legend { display: none; }

    .form-group { margin-bottom: 25px; }

    .form-group label {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-group input {
        width: 100%;
        padding: 14px 18px;
        font-size: 14px;
        background: #f9fafb;
        border: 1px solid #f3f4f6;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .form-group input:focus {
        outline: none;
        background: #ffffff;
        border-color: var(--lecturer-tan);
        box-shadow: 0 0 0 4px rgba(196, 121, 85, 0.1);
    }

    /* Action Buttons */
    .form-action-footer {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
    }

    .submit-btn {
        background: var(--lecturer-tan);
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3);
    }

    .back-link {
        text-decoration: none;
        color: var(--lecturer-tan);
        font-weight: 700;
        font-size: 13px;
    }
</style>
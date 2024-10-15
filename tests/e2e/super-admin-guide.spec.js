const { test, expect } = require('@playwright/test');

test.describe('Guide d\'utilisation pour les super administrateurs', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/login');
    await page.fill('input[type="email"]', 'john.doe@helper.app');
    await page.fill('input[type="password"]', 'Passw@rd');
    await page.click('button.filament-button');
  });

  test('Invitation d\'utilisateurs', async ({ page }) => {
    await page.goto('/admin/users');
    await page.click('button:has-text("Inviter un utilisateur")');

    await page.fill('input[name="name"]', 'Nouvel Utilisateur');
    await page.fill('input[name="email"]', 'nouvel.utilisateur@example.com');
    await page.click('button:has-text("Envoyer l\'invitation")');

    await expect(page.locator('text=Invitation envoyée avec succès')).toBeVisible();
  });

  test('Création d\'un projet', async ({ page }) => {
    await page.goto('/admin/projects');
    await page.click('button:has-text("Créer un projet")');

    await page.fill('input[name="name"]', 'Nouveau Projet');
    await page.fill('textarea[name="description"]', 'Description du nouveau projet');
    await page.selectOption('select[name="client"]', 'Client A');
    await page.selectOption('select[name="status_type"]', 'Global');
    await page.click('button:has-text("Créer")');

    await expect(page.locator('text=Projet créé avec succès')).toBeVisible();
  });

  test('Gestion des rôles et permissions', async ({ page }) => {
    await page.goto('/admin/roles');
    await page.click('button:has-text("Créer un rôle")');

    await page.fill('input[name="name"]', 'Nouveau Rôle');
    await page.check('input[name="permissions"][value="view_projects"]');
    await page.check('input[name="permissions"][value="create_tickets"]');
    await page.click('button:has-text("Créer")');

    await expect(page.locator('text=Rôle créé avec succès')).toBeVisible();
  });

  test('Configuration des statuts de tickets', async ({ page }) => {
    await page.goto('/admin/ticket-statuses');
    await page.click('button:has-text("Créer un statut")');

    await page.fill('input[name="name"]', 'Nouveau Statut');
    await page.fill('input[name="color"]', '#FF5733');
    await page.click('button:has-text("Créer")');

    await expect(page.locator('text=Statut créé avec succès')).toBeVisible();
  });
});

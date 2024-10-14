const { test, expect } = require('@playwright/test');

test.describe('Guide d\'utilisation pour les utilisateurs', () => {
  test('Accès à l\'application', async ({ page }) => {
    const invitationToken = '123456';
    const invitationLink = `/accept-invitation/${invitationToken}`;
    
    await page.goto(invitationLink);
    await expect(page).toHaveTitle(/Définir le mot de passe/);

    await page.fill('input[name="password"]', 'MotDePasse123!');
    await page.fill('input[name="password_confirmation"]', 'MotDePasse123!');
    await page.click('button.filament-button');

    await expect(page).toHaveURL(/\/dashboard/);
  });

  test('Connexion', async ({ page }) => {
    await page.goto('/login');
    await page.fill('input[name="email"]', 'utilisateur@example.com');
    await page.fill('input[name="password"]', 'MotDePasse123!');
    await page.click('button[type="submit"]');

    await expect(page).toHaveURL(/\/dashboard/);
  });

  test('Créer un ticket', async ({ page }) => {
    await page.goto('/admin/projects/1');
    await page.click('button:has-text("Nouveau ticket")');

    await page.fill('input[name="title"]', 'Nouveau ticket de test');
    await page.fill('textarea[name="description"]', 'Description du ticket de test');
    await page.selectOption('select[name="priority"]', 'Moyenne');
    await page.click('button:has-text("Créer")');

    await expect(page.locator('text=Ticket créé avec succès')).toBeVisible();
  });

  test('Mettre à jour un ticket', async ({ page }) => {
    await page.goto('/admin/tickets/1');
    await page.click('button:has-text("Modifier")');

    await page.fill('input[name="title"]', 'Titre mis à jour');
    await page.fill('textarea[name="comment"]', 'Nouveau commentaire');
    await page.click('button:has-text("Enregistrer")');

    await expect(page.locator('text=Ticket mis à jour avec succès')).toBeVisible();
  });

  test('Déconnexion', async ({ page }) => {
    await page.goto('/admin/dashboard');
    await page.click('button:has-text("Compte")');
    await page.click('button:has-text("Déconnexion")');

    await expect(page).toHaveURL(/\/login/);
  });
});

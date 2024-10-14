import { defineConfig } from '@playwright/test';
import path from 'path';



export default defineConfig({
  testDir: './tests/e2e',
  use: {
    baseURL: 'http://localhost:8000',
    screenshot: 'on',
    video: 'on-first-retry',
  },

  reporter: [
    ['html', { outputFolder: path.join('test-results', 'html-report') }],
    ['list']
  ],
  webServer: {
    command: 'php artisan serve',
    port: 8000,
    timeout: 120 * 1000,
    reuseExistingServer: !process.env.CI,
  },
});

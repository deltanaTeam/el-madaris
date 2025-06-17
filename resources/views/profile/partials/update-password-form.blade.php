<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('lang.Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('lang.Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-4">
      <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          {{ __('lang.Current Password') }}
      </label>
      <input
          id="update_password_current_password"
          name="current_password"
          type="password"
          autocomplete="current-password"
          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >

  </div>

  <div class="mb-4">
      <label for="update_password_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          {{ __('lang.New Password') }}
      </label>
      <input
          id="update_password_password"
          name="password"
          type="password"
          autocomplete="new-password"
          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >

  </div>

  <div class="mb-4">
      <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          {{ __('lang.Confirm Password') }}
      </label>
      <input
          id="update_password_password_confirmation"
          name="password_confirmation"
          type="password"
          autocomplete="new-password"
          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >

  </div>

        <div class="flex items-center gap-4">
          <button
              type="submit"
              class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
          >
              {{ __('lang.Save') }}
          </button>

          @if (session('status') === 'password-updated')
              <p
                  x-data="{ show: true }"
                  x-show="show"
                  x-transition
                  x-init="setTimeout(() => show = false, 2000)"
                  class="text-sm text-gray-600 dark:text-gray-400"
              >
                  {{ __('lang.Saved.') }}
              </p>
          @endif
      </div>
    </form>
</section>

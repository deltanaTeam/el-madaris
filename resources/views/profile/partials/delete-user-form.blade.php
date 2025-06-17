<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-theme-3">
            {{ __('lang.Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-theme-3">
            {{ __('lang.Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div x-data>
      <button
          @click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
          class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
      >
          {{ __('lang.Delete Account') }}
      </button>
  </div>

  <div
  x-data="{ show: @js($errors->userDeletion->isNotEmpty()) }"
  x-show="show"
  @open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
  @close.window="show = false"
  x-cloak
  class="fixed inset-0 flex items-center justify-center z-50 bg-black/50"
  aria-modal="true"
  role="dialog"
>
  <div @click.away="show = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md p-6">
      <form method="POST" action="{{ route('profile.destroy') }}">
          @csrf
          @method('DELETE')

          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
              {{ __('lang.Are you sure you want to delete your account?') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
              {{ __('lang.Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
          </p>

          <div class="mt-6">
              <label for="password" class="sr-only">{{ __('lang.Password') }}</label>
              <input
                  id="password"
                  name="password"
                  type="password"
                  class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="{{ __('Password') }}"
              />
              @error('password', 'userDeletion')
                  <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
              @enderror
          </div>

          <div class="mt-6 flex justify-end">
              <button type="button"
                  @click="show = false"
                  class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                  {{ __('lang.Cancel') }}
              </button>

              <button type="submit"
                  class="ms-3 inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition">
                  {{ __('lang.Delete Account') }}
              </button>
          </div>
      </form>
  </div>
</div>
</section>

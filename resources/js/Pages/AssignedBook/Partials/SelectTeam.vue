<script setup>

import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    current_team: Object,
});

const form = useForm({
  team_id: '',
});

const selectTeam = (team) => {
    form.team_id = team.id;
    form.post(route('assigned_books.select'), 
    {
        preserveState: false,
    });
};
</script>

<template>
    <span v-for="current_team_value in current_team">
    <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
        <template #trigger>
            <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                    
                        {{ current_team_value.name }}
                    
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                </button>
            </span>
        </template>

        <template #content>
            <div class="w-60">
                <!-- Team Management -->
                <template v-if="$page.props.jetstream.hasTeamFeatures">
                    <!-- Team Switcher -->
                    <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                        <form @submit.prevent="selectTeam(team)">
                            <DropdownLink as="button">
                                <div class="flex items-center">
                                    <svg v-if="team.id == current_team_value.id" class="mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    <div>{{ team.name }}</div>
                                </div>
                            </DropdownLink>
                        </form>
                    </template>
                </template>
            </div>
        </template>
        
    </Dropdown>          
    </span>
</template>

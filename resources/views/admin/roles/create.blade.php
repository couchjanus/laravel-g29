<x-admin-layout>
   <x-slot name="header">
       <div class="flex justify-between">
           <h1 class="text-3xl text-black pb-6">Create Role</h1>
           <div class="flex">
               <a href="{{ route('roles.index') }}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-l">All roles</button></a>
           </div>
       </div>
   </x-slot>
   <div class="w-full mt-12">
       <p class="text-xl pb-3 flex items-center">
           <i class="fas fa-align-left mr-3"></i> Add new role
       </p>
<div class="ml-4 mt-16 w-9/12">
 <form action="{{route('roles.store')}}" method="POST">
     @csrf
      <h1 class="text-3xl mt-4 mb-8"> Create Role </h1>
     <div class="mb-6">
         <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
         <input type="text" value="{{old('name')}}" name="name" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="User, Editor, Author ... " >
         @foreach ($errors->get('name') as $error)
             <p class="text-red-600">{{$error}}</p>
         @endforeach
     </div>
<table class="permissionTable border rounded-md bg-white overflow-hidden shadow-lg my-4 p-4">
         <th class="px-4 py-4">
             {{__('Section')}}
         </th>
         <th class="px-4 py-4">
             <label>
                 <input class="grand_selectall" type="checkbox">
                 {{__('Select All') }}
             </label>
         </th>
         <th class="px-4 py-4">
             {{__("Available permissions")}}
         </th>

<tbody>
         @foreach($permissions as $key => $group)
             <tr class="py-8">
                 <td class="p-6">
                     <b>{{ ucfirst($key) }}</b>
                 </td>
                 <td class="p-6" width="30%">
                     <label>
                         <input class="selectall" type="checkbox">
                         {{__('Select All') }}
                     </label>
                 </td>


                 <td class="p-6">
                     @forelse($group as $permission)
                     <label style="width: 30%" class="">
                         <input name="permissions[]" class="permissioncheckbox" class="rounded-md border" type="checkbox" value="{{ $permission->id }}">
                         {{$permission->name}} &nbsp;&nbsp;
                     </label>
                     @empty  {{ __("No permission in this group !") }}  @endforelse
                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>

     <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
         Create Role
     </button>

   </form>
 </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script>
$(".permissionTable").on('click', '.selectall', function () {

if ($(this).is(':checked')) {
   $(this).closest('tr').find('[type=checkbox]').prop('checked', true);

} else {
   $(this).closest('tr').find('[type=checkbox]').prop('checked', false);

}

calcu_allchkbox();
});

$(".permissionTable").on('click', '.grand_selectall', function () {
if ($(this).is(':checked')) {
   $('.selectall').prop('checked', true);
   $('.permissioncheckbox').prop('checked', true);
} else {
   $('.selectall').prop('checked', false);
   $('.permissioncheckbox').prop('checked', false);
}
});
$(function () {
calcu_allchkbox();
selectall();
});

function selectall(){
$('.selectall').each(function (i) {
   var allchecked = new Array();
   $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
       if ($(this).is(":checked")) {
           allchecked.push(1);
       } else { allchecked.push(0);   }
   });
   if ($.inArray(0, allchecked) != -1) {
       $(this).prop('checked', false);
   } else {  $(this).prop('checked', true);  }
});
}

function calcu_allchkbox(){
var allchecked = new Array();
$('.selectall').each(function (i) {
   $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
       if ($(this).is(":checked")) {
           allchecked.push(1);
       } else {
           allchecked.push(0);
       }
   });

});

if ($.inArray(0, allchecked) != -1) {
   $('.grand_selectall').prop('checked', false);
} else {   $('.grand_selectall').prop('checked', true);}
}

$('.permissionTable').on('click', '.permissioncheckbox', function () {
var allchecked = new Array;
$(this).closest('tr').find('.permissioncheckbox').each(function (index) {
   if ($(this).is(":checked")) {
       allchecked.push(1);
   } else {
       allchecked.push(0);
   }
});
if ($.inArray(0, allchecked) != -1) {
   $(this).closest('tr').find('.selectall').prop('checked', false);
} else {
   $(this).closest('tr').find('.selectall').prop('checked', true);

}

calcu_allchkbox();
});

</script>

</x-admin-layout>
